<?php

namespace App\Http\Controllers\Deposit;

use Exception;
use Stripe;
use App\Models\Deposit;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;

class StripeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'method' => 'required',
            'amount' => 'required',
            'details' => 'required',
            'card_no' => 'required',
            'ccExpireMonth' => 'required',
            'ccExpireYear' => 'required',
            'cvvNumber' => 'required'
            
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

        $payment = Payment::first();

        $stripe = Stripe::setApiKey($payment->payment_secret);

        try {

        $token = $stripe->tokens()->create([
            'card' => [
                'number' => $request->card_no,
                'exp_month' => $request->ccExpireMonth,
                'exp_year' => $request->ccExpireYear,
                'cvc' => $request->cvvNumber,
            ],
        ]);

        if (!isset($token['id'])) {
            return back();
        }

        $charge = $stripe->charges()->create([
            'card' => $token['id'],
            'currency' => 'USD',
            'amount' => $amount,
            'description' => 'wallet',
        ]);
        
        if($charge['status'] == 'succeeded') 
        {
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

            return back()->with('success', 'Deposit sent successfull.');

        }else {

            return back()->with('message','Money not add in wallet!!');
        }

        } catch (Exception $e) {

            return back()->with('message', $e->getMessage());

        } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {

            return back()->with('message', $e->getMessage());

        } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {

            return back()->with('message', $e->getMessage());

        }
    }    
}
