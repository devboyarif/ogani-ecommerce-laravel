<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Shiping;
use Crypt;
use Session;
class ShippingController extends Controller
{
    // Order Shipping Details  
    function shipping_details($user_id){
        $cart = Cart::where('user_id',Crypt::decrypt($user_id))->latest()->get();     
        return view('users.pages.Shipping.shipping_details',compact('cart'));
   }


}
