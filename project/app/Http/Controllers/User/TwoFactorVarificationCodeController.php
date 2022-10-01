<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use jpmurray\LaravelCountdown\Countdown;

class TwoFactorVarificationCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function twoFactorVarificationOn()
    {

        return view('user.auth.two-factor-varification-form');
    }

    public function twoFactorVarificationOff()
    {
        $user = auth()->guard('user')->user();
        $user->status = 0;
        $user->update();
        return back();
    }

    public function twoFactorPasswordCheck(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        $user = auth()->guard('user')->user();
        $password = $request->password;

        if(!Hash::check($password, $user->password)){
            return back()->with('message', 'Password does not match.');
        }

        $user->two_factor_varification = random_int(100000, 999999);
        $user->status = 1;
        $user->update();

        return redirect()->route('user.two.factor.varification');
    }

    public function twoFactorVarification()
    {
        return view('user.auth.two_factor_varification');
    }

    public function twoFactorVarificationCheck(Request $request)
    {
        $request->validate([
            'two_factor_varification_code' => 'required'
        ]);

        $user = auth()->guard('user')->user();
        $current_time = now();
        $end_time = $user->updated_at->addMinutes(1);

        if($current_time > $end_time)
        {
            return back()->with('message', 'Your time is over. Please, try again.');
        }

        Session::put('2fa', $request->two_factor_varification_code);

        if($user->two_factor_varification != $request->two_factor_varification_code)
        {
            return back()->with('message', 'Varification code does not match.');
        }

        $user->status = 1;
        $user->update();

        return redirect()->route('user.dashboard');
    }
}
