<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'restaurant_id',
        'menu_categories_id',
        'item_name',
        'image_url',
        'description',
        'price',
        'rating',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_categories_id');
    }

     public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
