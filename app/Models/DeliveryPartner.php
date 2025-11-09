<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DeliveryPartner extends Authenticatable
{
    use Notifiable;

    protected $guard = 'delivery';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'dob',
        'cnic',
        'total_deliveries',
        'profile_image',
        'vehical',
        'status',
        'rating',
        'gender'
    ];

    public function location()
    {
        return $this->hasOne(DeliverPartnerLocation::class, 'delivery_partner_id');
    }
}
