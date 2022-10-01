<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransferMoney;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user', 'twofactor']);
    }
    
    public function index()
    {
        $user = auth()->guard('user')->user();

        $datas = Transaction::with('user')->where('user_id', $user->id)->where('remark', 'transfer_money')->orwhere('remark', 'receive_money')->get();

        return view('user.transfer.index', compact('datas'));
    }

    public function create()
    {
        $gsetting = GeneralSetting::first();
        return view('user.transfer.create', compact('gsetting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'amount' => 'required',
            'details' => 'required'
        ]);
        
        $sender = auth()->guard('user')->user();
        $gsetting = GeneralSetting::first();

        if($sender->email == $request->email)
        {
            return back()->with('message','You can not transfer money in your account.');
        }
       
        $receiver = User::where('email', $request->email)->first();
        if(!$receiver)
        {
            return back()->with('message', 'Receiver not found.');
        }

        $amount = $request->amount;
        $min_amount = $gsetting->transfer_min_amount;
        $max_amount = $gsetting->transfer_max_amount;

        if($amount > $max_amount || $amount < $min_amount)
        {
            return back()->with('message','Please follow the limits.');
        }

        if($sender->balance < $amount)
        {
            return back()->with('message','Insufficient balance.');
        }

        

        $charge = ($gsetting->transfer_charge * $amount) / 100;

        $senderTrx = new Transaction();
      
        $sender->decrement('balance', $amount);

        $senderTrx->user_id = $sender->id;
        $senderTrx->transaction_id = Str::random(12);
        $senderTrx->amount = $amount;
        $senderTrx->remark = 'transfer money';
        $senderTrx->details = $request->details;
        $senderTrx->charge = $charge;
        $senderTrx->type = "-";
        $senderTrx->save();

      
        $receiver->increment('balance', $amount - $charge);
        $receiverTrx = new Transaction();
        $receiverTrx->user_id = $receiver->id;
        $receiverTrx->transaction_id =  $senderTrx->transaction_id;
        $receiverTrx->amount = $amount;
        $receiverTrx->remark = 'receive_money';
        $receiverTrx->details = $request->details;
        $receiverTrx->charge = $charge;
        $receiverTrx->type = "+";
        $receiverTrx->save();

        return back()->with('success', 'Money Transfer Successfully.');
    }
}
