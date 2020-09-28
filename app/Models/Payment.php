<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_method', 'payment_status','transaction_no','shipping_id','user_id'
    ];
}
