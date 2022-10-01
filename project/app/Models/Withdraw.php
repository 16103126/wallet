<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'transaction_id', 'status', 'method', 'amount', 'charge'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function withdrawMethod()
    {
        return $this->belongsTo(WithdrawMethod::class);
    }
}
