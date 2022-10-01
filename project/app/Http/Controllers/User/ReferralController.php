<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Referral;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user', 'twofactor']);
    }

    public function index()
    {
        $datas = User::where('referred_by', auth()->guard('user')->user()->id)->get();
        $bonus = Referral::first();
        
        return view('user.referral.index', compact('datas', 'bonus'));
    }
}
