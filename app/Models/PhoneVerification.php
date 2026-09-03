<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneVerification extends Model
{
    protected $fillable = [
        'phone',
        'otp_code',
        'otp_hash',
        'attempts',
        'max_attempts',
        'is_verified',
        'expires_at',
        'verified_at',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'is_verified'  => 'boolean',
        'expires_at'   => 'datetime',
        'verified_at'  => 'datetime',
    ];
}
