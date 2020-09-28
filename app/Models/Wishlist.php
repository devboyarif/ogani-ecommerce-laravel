<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id', 'product_id','user_ip'
    ];




    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
