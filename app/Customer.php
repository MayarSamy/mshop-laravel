<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Customer extends User
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
