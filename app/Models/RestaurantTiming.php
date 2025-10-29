<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantTiming extends Model
{
    protected $fillable = [
        'restaurant_location_id',
        'week_day',
        'opening_time',
        'closing_time',
    ];


    public function location()
{
    return $this->belongsTo(RestaurantLocation::class, 'restaurant_location_id');
}
}
