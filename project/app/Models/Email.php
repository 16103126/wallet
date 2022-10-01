<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_host', 'email_port', 'smtp_username', 'smtp_password', 'from_email', 'from_name', 'email_encryption'
    ];
}
