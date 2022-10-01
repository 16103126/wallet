<?php

use App\Models\Currency;

function currencyValue()
{
    $value = Currency::where('is_default', 1)->first()->value;
    return $value;
}

function currencySign()
{
    $sign = Currency::where('is_default', 1)->first()->sign;
    return $sign;
}
