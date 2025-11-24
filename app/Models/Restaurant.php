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

public function categories()
{
    return $this->belongsToMany(Category::class, 'restaurant_category_pivot', 'restaurant_id', 'category_id');
}

 
      



   
}
