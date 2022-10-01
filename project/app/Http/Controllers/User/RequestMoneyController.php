<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\RequestMoney;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Currency;

class RequestMoneyController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth:user', 'twofactor']);
    }
    
    public function sentRequestList()
    {
        $datas = RequestMoney::where('sender_id', auth()->guard('user')->user()->id)->get();

        return view('user.request.sent-request-list', compact('datas'));

    }

    public function moneyRequestList()
    {
        $datas = RequestMoney::where('receiver_id', auth()->guard('user')->user()->id)->get();

        return view('user.request.money-request-list', compact('datas'));
    }

    public function create()
    {

        $gsetting = GeneralSetting::first();

        $currency = Currency::where('is_default', 1)->first();

        return view('user.request.create', compact('gsetting', 'currency'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'details' => 'required',
            'amount' => 'required',
            'email' => 'required|email'
        ]);

        $receiver = User::where('email', $request->email)->first();
        $sender = auth()->guard('user')->user();
        
        $requestSetting = GeneralSetting::first();

        $amount = $request->amount;
        $max_amount = $requestSetting->request_max_amount;
        $min_amount = $requestSetting->request_min_amount;

        if(!$receiver)
        {
            return back()->with('message', 'Invalid receiver email.');
        }

        if($receiver == $sender)
        {
            return back()->with('message', 'You can not sent request in your account.');
        }

        if($amount > $max_amount || $amount < $min_amount)
        {
            return back()->with('message', 'Please, follow the limit.');
        }

        $requestMoney = new RequestMoney();

        $requestMoney->sender_id = $sender->id;
        $requestMoney->receiver_id = $receiver->id;
        $requestMoney->amount = $amount;
        $requestMoney->details = $request->details;

        $requestMoney->save();

        return back()->with('success', 'Request Sent Successfully.');
    }

    public function status($id1, $id2)
    {
        $data = RequestMoney::find($id1);

        $data->status = $id2;

        $amount = $data->amount;

        $receiver = auth()->guard('user')->user();

        if($amount > $receiver->balance)
        {
            return back()->with('message', 'Insufficient balance');
        }

        $sender = User::where('id', $data->sender_id)->first();
        $receiver->decrement('balance', $amount);

        $gsetting = GeneralSetting::first();
        $fixed_charge = $gsetting->request_fixed_charge;
        $percentage_charge = ($amount * $gsetting->request_percentage_charge) / 100;
        $charge = ($fixed_charge + $percentage_charge);
        
        $receiverTrx = new Transaction();
        $receiverTrx->user_id = $receiver->id;
        $receiverTrx->transaction_id = Str::random(12);
        $receiverTrx->amount = $amount;
        $receiverTrx->remark = 'receive request';
        $receiverTrx->details = $data->details;
        $receiverTrx->charge = $charge;
        $receiverTrx->type = "-";
        $receiverTrx->save();

        
        $sender->increment('balance', $amount - $charge);

        $senderTrx = new Transaction();
        $senderTrx->user_id = $sender->id;
        $senderTrx->transaction_id = $receiverTrx->transaction_id;
        $senderTrx->amount = $amount;
        $senderTrx->remark = 'sent request';
        $senderTrx->details = $data->details;
        $senderTrx->charge = $charge;
        $senderTrx->type = "+";
        $senderTrx->save();

        $data->update();
        
        return back()->with('success', 'Status update successfully.');
    }

    public function details($id)
    {
        $gsetting = GeneralSetting::first();
        $fixed_charge = $gsetting->request_fixed_charge;
        $percentage_charge = $gsetting->request_percentage_charge;

        $details = RequestMoney::findOrFail($id);

        return view('user.request.details', compact('details', 'fixed_charge', 'percentage_charge'));
    }

}
