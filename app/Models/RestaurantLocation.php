<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantLocation extends Model
{
    protected $fillable = [
        'restaurant_id',
        'city_id',
        'province_id',
        'address',
        'locality',
        'latitude',
        'branch_phone_number',
        'branch_email',
        'is_main',
        'longitude',
    ];
    

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function timing()
    {
        return $this->hasOne(RestaurantTiming::class, 'restaurant_location_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
