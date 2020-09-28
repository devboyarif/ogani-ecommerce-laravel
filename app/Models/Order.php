<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'shipping_id','payment_id','order_total','order_status'
    ];

    public function userr(){
        return $this->belongsTo(UserAuth::class,'user_id');
    }
    
    public function shipping(){
        return $this->belongsTo(Shiping::class,'shipping_id');
    }

    public function payment(){
        return $this->belongsTo(Payment::class,'payment_id');
    }

  
}
