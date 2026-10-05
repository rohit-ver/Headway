<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'inquiry_id',
        'order_number',
        'total_amount',
        'status',
    ];

    protected static function booted(): void
    {
        // order number apne aap banao: HW-10001, HW-10002 ...
        static::created(function (Order $order) {
            if (! $order->order_number) {
                $order->order_number = 'HW-' . (10000 + $order->id);
                $order->saveQuietly();
            }
        });
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
}
