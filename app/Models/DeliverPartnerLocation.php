<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverPartnerLocation extends Model
{
    protected $fillable = [
        'delivery_partner_id',
        'city_id',
        'province_id',
        'address',
        'locality',
        'latitude',
        'longitude',
    ];

    public function deliveryPartner()
    {
        return $this->belongsTo(DeliveryPartner::class, 'delivery_partner_id');
    }
}
