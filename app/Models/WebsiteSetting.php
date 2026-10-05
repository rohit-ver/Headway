<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'company_name',
        'email',
        'phone',
        'whatsapp',
        'address',

        'facebook',
        'instagram',
        'linkedin',
        'youtube',

        'logo',
        'favicon',
        'website_status',

        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'website_status' => 'boolean',
    ];
}