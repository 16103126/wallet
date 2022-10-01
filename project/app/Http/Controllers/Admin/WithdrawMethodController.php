<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WithdrawMethod;
use Illuminate\Http\Request;

class WithdrawMethodController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    public function index()
    {
        $datas = WithdrawMethod::get();

        return view('admin.withdrawMethod.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.withdrawMethod.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'status' => 'required'
        ]);

        $withdrawMethod = new WithdrawMethod();
        $withdrawMethod->method = $request->method;
        $withdrawMethod->status = $request->status;
        $withdrawMethod->save();

        return back()->with('success', 'Method save successfully.');
    }

    public function edit($id)
    {
        $data = WithdrawMethod::findOrFail($id);

        return view('admin.withdrawMethod.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'method' => 'required',
            'status' => 'required'
        ]);

        $withdrawMethod = WithdrawMethod::findOrFail($id);
        $withdrawMethod->method = $request->method;
        $withdrawMethod->status = $request->status;
        $withdrawMethod->update();

        return back()->with('success', 'Method update successfully.');
    }

    public function delete($id)
    {
        WithdrawMethod::findOrFail($id)->delete();

        return back()->with('success', 'Method deleted successfully.');
    }

}
