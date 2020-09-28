<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\UserAuth;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //============== Admin Home ===================
    function home(){
        $product = Product::count();
        $orders = Order::where('status',1)->count();
        $complete_orders = Order::where('status','!=',1)->count();
        $customers = UserAuth::count();
        return view('admin.home',compact('product','orders','complete_orders','customers'));
    }
}
