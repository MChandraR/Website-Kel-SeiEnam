<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;

class Permohonan extends Authenticatable
{
    protected $table = "permohonan";
    protected $guarded = [];
}
