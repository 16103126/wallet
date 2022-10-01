<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function edit()
    {
        $data = Referral::first();

        return view('admin.referral.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'bonus_for_referrer' => 'required',
            'bonus_for_newuser' => 'required'
        ]);

        $data = Referral::first();

        $data->bonus_for_referrer = $request->bonus_for_referrer;
        $data->bonus_for_newuser = $request->bonus_for_newuser;

        $data->update();

        return back()->with('success', 'Data update successfully.');
    }
}
