<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    public function index()
    {
        $datas = Currency::all();

        return view('admin.currency.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.currency.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required|numeric',
            'sign' => 'required|max:3'
        ]);

        $data = new Currency();
    
        $data->name = $request->name;
        $data->value = $request->value;
        $data->sign = $request->sign;

        $isExist = Currency::where('is_default', 1)->exists();

        if(!$isExist){
             $data->is_default = 1;
        }

        $data->save();

        return back()->with('success', 'Currency save successfully.');

    }

    public function edit($id)
    {
        $data = Currency::findOrFail($id);

        return view('admin.currency.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required|numeric',
            'sign' => 'required|max:3'
        ]);

        $data = Currency::findOrFail($id);

        $data->name = $request->name;
        $data->value = $request->value;
        $data->sign = $request->sign;

        $data->update();

        return back()->with('success', 'Currency update successfully.');
    }

    public function status($id1, $id2)
    {
        $data = Currency::findOrFail($id1);

        $data->is_default = $id2;
        $data->update();

        $data = Currency::where('id', '!=', $id1)->update(['is_default' => 0]);

        return back()->with('success', 'Status update successfully.');
    }

    public function delete($id)
    {
        $data = Currency::findOrFail($id);

        if($data->is_default == 1)
        {
            return back()->with('message', 'You can not delete the main currency.');
        }

        $data->delete();

        return back()->with('success', 'Currency delete successfully.');
    }
}
