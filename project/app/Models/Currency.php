<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'value', 'sign', 'is_default'
    ];

    public function currencySign()
    {
        $sign = Currency::where('is_default', 1)->first()->sign;

        return $sign;
    }

    public function currencyValue()
    {
        $value = Currency::where('is_default', 1)->first()->value;

        return $value;
    }
}
