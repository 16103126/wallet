<?php

namespace App\Http\Controllers\User;

use App\Models\Wallet;
use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
     
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = auth::guard('user')->user();

            if($user->status == 1)
            {
                $user->two_factor_varification = random_int(100000, 999999);
                $user->update();
                return redirect()->route('user.two.factor.varification');
            }
            

            return redirect()->intended('user/dashboard');
         }

        return redirect()->route('user.login')->with('message','Login details are not valid.');

    }

    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect()->route('user.login');
    }
}
