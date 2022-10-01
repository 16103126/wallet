<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;

    protected $fillable = [
        'sms_key', 'sms_secret', 'from_sms', 'to_sms', 'status'
    ];
}
