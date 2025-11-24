<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantCategoryPivot extends Model
{
    protected $fillable = [
         'restaurant_id',
        'category_id',
    ];

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
