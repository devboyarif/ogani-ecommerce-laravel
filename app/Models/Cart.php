<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'product_quantity','product_price','user_ip','user_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
