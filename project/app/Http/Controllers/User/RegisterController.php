<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Currency;
use App\Models\Referral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class RegisterController extends Controller
{
    public function registerForm()
    {
        
        if(request('referral')){
            session()->put('referral',request('referral'));
        }

        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $referralUser = null;

        $referrer_bonus = Referral::first();

        if(Session('referral')){

            $referralUser = User::where('email', session('referral'))->first();

            $referralUser->balance= $referralUser->balance + $referrer_bonus->bonus_for_referrer;
            $referralUser->update();
            
        }

        $data = new User();
        $data->referred_by = $referralUser ? $referralUser->id : null;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        if($referrer_bonus->bonus_for_newuser){
            $data->balance = $data->balanc +  $referrer_bonus->bonus_for_newuser;
        }

        $data->save();

        $currencies = Currency::get(['id']);
        foreach($currencies as $currency){

            $wallet = new Wallet();
            $wallet->user_id = $data->id;
            $wallet->currency_id = $currency->id;
            $wallet->save();

        }
       
        return redirect()->route('user.login.form')->with('success', 'Data save successfully.');
    }
}
