<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'method', 'status'
    ];

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }
}
