<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'transfer_max_amount', 'transfer_min_amount', 'deposit_max_amount', 'deposit_min_amount', 'withdraw_max_amount', 'withdraw_min_amount', 'deposit_charge', 'transfer_charge', 'withdraw_charge'
    ];
}
