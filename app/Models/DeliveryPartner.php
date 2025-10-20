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
        'status'
    ];

   
}
