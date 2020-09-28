<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    protected $fillable = [
        'name', 'email','password','user_ip'
    ];
}
