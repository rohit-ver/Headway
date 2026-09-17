<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InquiryItem extends Model
{
    protected $fillable = [
        'inquiry_id',
        'product_id',
        'product_name',
        'quantity',
        'unit',
        'item_status',
    ];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}