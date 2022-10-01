<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Withdraw;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function withdrawRequest()
    {
        $withdraws = Withdraw::Where('status', 0)->with('user')->get();

        return view('admin.withdraw.withdraw-request', compact('withdraws'));
    }

    public function withdrawComplete()
    {
        $withdraws = Withdraw::where('status', 1)->with('user')->get();
        
        return view('admin.withdraw.withdraw-complete', compact('withdraws'));
    }

    public function status($id1, $id2)
    {
        $withdraw = Withdraw::with('user')->findOrFail($id1);
        $withdraw->status = $id2;

        if($id2 == 1){

            $user = User::with('user')->where('id', $withdraw->user_id)->first();

            $charge = $withdraw->charge;
            $amount = $withdraw->amount - $charge;

            $user->increment('balance', $amount);

            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->transaction_id = $withdraw->transaction_id;
            $transaction->amount = $amount;
            $transaction->type = '+';
            $transaction->remark = 'withdraw';
            $transaction->charge = $charge;
            $transaction->save();

        }

        $withdraw->update();
        
        return back()->with('success', 'Satatus upadate successfully!');
    }
}
