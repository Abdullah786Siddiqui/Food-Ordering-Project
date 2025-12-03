<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'city_id',
        'country',
        'latitude',
        'longitude',
        'is_primary',
    ];
     

    /**
     * Relationship: Location belongs to a specific User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: Only primary location fetch for show main location in ui
     */
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

   


    
}
