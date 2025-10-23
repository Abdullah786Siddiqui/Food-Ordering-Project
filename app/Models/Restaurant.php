<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Authenticatable
{
    use Notifiable;

    protected $guard = 'restaurant';

    protected $fillable = [
       'name',
        'email',
        'phone_number',
        'image',
        'password',
        'rating',
        'status',
    ];

      public function locations()
    {
        return $this->hasMany(RestaurantLocation::class);
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'restaurant_id');
    }

   
}
