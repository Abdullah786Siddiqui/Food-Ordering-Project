<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    protected $fillable = [
        'order_id',
        'amount',
        'payment_mode',
        'payment_status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
