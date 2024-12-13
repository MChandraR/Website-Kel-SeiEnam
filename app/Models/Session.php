<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 

class Session extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; 
    protected $table = "sessions";
    protected $guarded = [];
}
