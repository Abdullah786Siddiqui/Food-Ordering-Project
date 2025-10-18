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
        'password',
    ];

   
}
