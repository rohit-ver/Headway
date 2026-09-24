<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPasswordOtp extends Model
{
    protected $fillable = [
        'email',
        'otp',
        'expires_at',
        'attempts',
        'verified',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'verified' => 'boolean',
    ];
}