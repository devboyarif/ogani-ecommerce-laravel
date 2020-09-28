<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = [
        'order_id', 'user_id','product_id','product_price','product_sales_quantity'
    ];

    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
