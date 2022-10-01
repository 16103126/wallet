<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransferMoney;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $datas = Transaction::with('user')->get();
        return view('admin.transaction.index', compact('datas'));
    }
}
