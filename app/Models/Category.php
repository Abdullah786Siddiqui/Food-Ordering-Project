<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
     protected $fillable = [
        'category_name',
        'category_image',
        'status'
    ];

    public function restaurants()
{
    return $this->belongsToMany(Restaurant::class, 'restaurant_category_pivot', 'category_id', 'restaurant_id');
}


    public function menuItems()
{
    return $this->hasMany(MenuItem::class, 'category_id');
}
}
