<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'brand_id','product_name','product_slug','product_code','product_quantity','product_price','product_image_1','product_image_2','product_image_3','status','short_description','long_description'
    ];


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
}
