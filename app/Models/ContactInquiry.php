<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'whatsapp',
        'customer_type',
        'subject',
        'message',
        'status',
    ];
}