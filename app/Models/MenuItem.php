<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
       protected $fillable = [
        'restaurant_id',
        'category_id',
        'item_name',
        'image_url',
        'description',
        'price',
        'rating',
        'status'
    ];
    // MenuItem.php
public function restaurant()
{
    return $this->belongsTo(Restaurant::class, 'restaurant_id');
}


    // MenuItem.php
public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

}
