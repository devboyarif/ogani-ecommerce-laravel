<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shiping extends Model
{
    protected $fillable = [
        'fname', 'lname','address','town','country','zip','phone','email','user_id','user_ip'
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
