<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function chargeSetting()
    {
        $gsetting = GeneralSetting::first();

        return view('admin.gsetting.charge-setting', compact('gsetting'));
    }

    public function updateChargeSetting(Request $request)
    {
        $request->validate([
            'deposit_charge' => 'numeric|min:0',
            'transfer_charge' => 'numeric|min:0',
            'withdraw_charge' => 'numeric|min:0',
        ]);

        $gsetting = GeneralSetting::first();

        $gsetting->deposit_charge = $request->deposit_charge;
        $gsetting->transfer_charge = $request->transfer_charge;
        $gsetting->withdraw_charge = $request->withdraw_charge;

        $gsetting->update();

        return back()->with('success', 'Charge update successfully!');

    }

    public function minAmountSetting()
    {
        $gsetting = GeneralSetting::first();

        return view('admin.gsetting.min-amount', compact('gsetting'));
    }

    public function updateMinAmount(Request $request)
    {
        $request->validate([
            'deposit_min_amount' => 'numeric|min:0',
            'transfer_min_amount' => 'numeric|min:0',
            'withdraw_min_amount' => 'numeric|min:0',
        ]);

        $gsetting = GeneralSetting::first();

        $gsetting->deposit_min_amount = $request->deposit_min_amount;
        $gsetting->transfer_min_amount = $request->transfer_min_amount;
        $gsetting->withdraw_min_amount = $request->withdraw_min_amount;

        $gsetting->update();

        return back()->with('success', 'Min amount update successfully.');
    }

    public function maxAmountSetting()
    {
        $gsetting = GeneralSetting::first();

        return view('admin.gsetting.max-amount', compact('gsetting'));
    }

    public function updateMaxAmount(Request $request)
    {
        $request->validate([
            'deposit_max_amount' => 'numeric|min:0',
            'transfer_max_amount' => 'numeric|min:0',
            'withdraw_max_amount' => 'numeric|min:0',
        ]);

        $gsetting = GeneralSetting::first();

        if($request->deposit_max_amount)
        {
            $gsetting->deposit_max_amount = $request->deposit_max_amount;
        }

        if($request->transfer_max_amount)
        {
            $gsetting->transfer_max_amount = $request->transfer_max_amount;
        }

        if($request->withdraw_max_amount)
        {
            $gsetting->withdraw_max_amount = $request->withdraw_max_amount;
        }

        $gsetting->update();

        return back()->with('success', 'Max amount update successfully.');
    }
}
