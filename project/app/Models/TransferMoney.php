<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferMoney extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_no', 'sender_name', 'receiver_name', 'amount', 'charge', 'details'
    ];
}
