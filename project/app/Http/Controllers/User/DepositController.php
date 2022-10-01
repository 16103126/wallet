<?php

namespace App\Http\Controllers\User;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Deposit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user', 'twofactor']);
    }

    public function index()
    {
        $user = auth()->guard('user')->user();
        $deposits = Deposit::with('user')->Where('user_id', $user->id)->get();

        return view('user.deposit.index', compact('deposits'));
    }

    public function create()
    {
        $gsetting = GeneralSetting::first();

        return view('user.deposit.create', compact('gsetting'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'amount' => 'required',
            'details' => 'required'
        ]);

        $gsetting = GeneralSetting::first();

        $user = auth()->guard('user')->user();

        $amount = $request->amount;
        $max_amount = $gsetting->deposit_max_amount;
        $min_amount = $gsetting->deposit_min_amount;

        if($amount > $max_amount || $amount < $min_amount)
        {
            return back()->with('message', 'Please follow the limits.');
        }

        if($user->balance < $amount)
        {
            return back('message', 'Insufficent balance.');
        }

        $charge = ($amount * $gsetting->deposit_charge) / 100;

        $deposit = new Deposit();
        $deposit->user_id = $user->id;
        $deposit->transaction_id = Str::random(12);
        $deposit->amount = $amount;

        $user->decrement('balance', $amount);

        $deposit->method = $request->method;
        $deposit->details = $request->details;
        $deposit->charge = $charge;
        $deposit->save();
        
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->transaction_id = $deposit->transaction_id;
        $transaction->amount = $amount;
        $transaction->remark = 'deposit';
        $transaction->type = '-';
        $transaction->details = $request->details;
        $transaction->charge = $charge;
        $transaction->save();

        return back()->with('success', 'Deposit sent successfully!');

    }
}
