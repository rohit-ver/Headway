<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InquiryItem;

class Inquiry extends Model
{
    protected $fillable = [
        'customer_id',
        'name',
        'company_name',
        'email',
        'country_code',
        'phone',
        'customer_type',
        'city',
        'message',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(InquiryItem::class);
    }
}