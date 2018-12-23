<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomerUser extends Authenticatable
{
    // use Notifiable;
    protected $table = 'msuser';
    protected $fillable = [
        'role', 'name', 'email', 'password', 'phone', 'address', 'dob'

    ];
}
