<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth:user', 'twofactor']);
    }
    
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->guard('user')->user()->id)->get();

        return view('user.transaction', compact('transactions'));
    }
}
