<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;

class users extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['username', 'password'];
}
