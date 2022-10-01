<?php

namespace App\Http\Controllers\User;

use App\Models\Withdraw;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\WithdrawMethod;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user', 'twofactor']);
    }

    public function index()
    {
        $user = auth()->guard('user')->user();
        $withdraws = Withdraw::with('user')->where('user_id', $user->id)->get();

        return view('user.withdraw.index', compact('withdraws'));
    }
    
    public function create()
    {
        $gsetting = GeneralSetting::first();

        $methods = WithdrawMethod::get();

        return view('user.withdraw.create', compact('gsetting', 'methods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'method' => 'required',
        ]);

        $user = auth()->guard('user')->user();

        $gsetting = GeneralSetting::first();

        $max_amount = $gsetting->withdraw_max_amount;
        $min_amount = $gsetting->withdraw_min_amount;
        $amount = $request->amount;

        if($amount > $max_amount || $amount < $min_amount)
        {
            return back()->with('message', 'please follow the limit.');
        }

        if($amount > $user->balance)
        {
            return back()->with('message', 'Insufficent balance.');
        }

        $withdraw = new Withdraw();
        $withdraw->user_id = $user->id;
        $withdraw->transaction_id = Str::random(12);
        $withdraw->amount = $amount;
        $withdraw->method = $request->method;

        $charge = ($amount * $gsetting->withdraw_charge) / 100;
        $withdraw->charge = $charge;
        $withdraw->save();

        return back()->with('success', 'Withdraw sent successfully.');
    }
}
