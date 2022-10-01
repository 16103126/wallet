<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\RequestMoney;
use Illuminate\Http\Request;

class RequestMoneyController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    public function index()
    {
        $datas = RequestMoney::get();

        return view('admin.request.index', compact('datas'));
    }

    public function requestSetting()
    {
        $data = GeneralSetting::first();

        return view('admin.request.setting', compact('data'));
    }

    public function requestSettingUpdate(Request $request)
    {
        $request->validate([
            'max_amount' => 'required|numeric|min:0',
            'min_amount' => 'required|min:0',
            'fixed_charge' => 'required',
            'percentage_charge' => 'required'
        ]);

        $requestSetting = GeneralSetting::first();
        $requestSetting->request_max_amount = $request->max_amount;
        $requestSetting->request_min_amount = $request->min_amount;
        $requestSetting->request_fixed_charge = $request->fixed_charge;
        $requestSetting->request_percentage_charge = $request->percentage_charge;

        $requestSetting->update();

        return back()->with('success', 'Data update successfully');
    }

    public function details($id)
    {
        $gsetting = GeneralSetting::first();
        $fixed_charge = $gsetting->request_fixed_charge;
        $percentage_charge = $gsetting->request_percentage_charge;

        $details = RequestMoney::findOrFail($id);

        return view('admin.request.details', compact('details', 'fixed_charge', 'percentage_charge'));
    }
}
