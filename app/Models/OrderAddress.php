<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
     protected $fillable = [
        'order_id', 'address', 'locality', 'city_id',  'latitude', 'longitude'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
