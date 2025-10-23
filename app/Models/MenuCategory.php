<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $fillable = [
        'category_name',
    ];
    public function items()
    {
        return $this->hasMany(MenuItem::class, 'menu_categories_id');
    }
}
