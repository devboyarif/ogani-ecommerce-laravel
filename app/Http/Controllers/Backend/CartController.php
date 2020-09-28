<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Coupon;
use Crypt;
use Session;
class CartController extends Controller
{

    //========Add Cart=======
    function addCart($product_id){

        $check = Cart::where('product_id',$product_id)->where('user_id',request('user_id'))->first();
        if ($check) {
            
            Cart::where('product_id',$product_id)->where('user_id',request('user_id'))->increment('product_quantity');
            echo json_encode(['status' => 'success','message' => "This product already added to cart"]);

        }else{

            $product = Product::find($product_id);
            
            $product_price = $product->product_price;
            Cart::create([
                'product_id' => $product_id,
                'product_quantity' => 1,
                'product_price' => $product_price,
                'user_ip' => request('user_ip'),
                'user_id' => request('user_id'),
            ]);

            echo json_encode(['status' => 'success','message' => "Cart Added Successfully"]);
        }

    }

    //========Count Total Quantity=======
    function total_quantity(){
        $cart = Cart::where('user_id',request('user_id'))->sum('product_quantity');      
        return response()->json($cart);
    }

    //========Sub Total Product Price=======
    function total_price(){

        $total = Cart::all()->where('user_id',request('user_id'))->sum(function($tot){
            return $tot->product_price * $tot->product_quantity;
        });   
        return response()->json($total);

    }

    //========Show Cart Page=======
    function show_Cart_page($user_id){

       $cart = Cart::where('user_id',Crypt::decrypt($user_id))->latest()->get();
       return view('users.pages.Cart.cart_page',compact('cart'));
    }

    //========Update Product Quantity=======
    function quantity_update_Cart($id){
        Cart::where('id',$id)->where('user_ip',request()->ip())->update([
            'product_quantity' => request('cart_quantity')
        ]);
        Session::forget('coupon');
        return back()->with('cart_quantity','Cart Quantity Updated Successfully');
    }

    //========Destroy Cart=======
    function destroyCart($id){

        Cart::where('id',Crypt::decrypt($id))->delete();
        Session::forget('coupon');
        return back()->with('cart_quantity','Cart Removed Successfully');
    }

    //========Coupon Apply=======
    function apply_coupon(){
        $check = Coupon::where('coupon_name',request()->coupon_code)->where('status',1)->first();
        if ($check) {
            session()->put('coupon',[
                'coupon_name' =>  $check->coupon_name,
                'coupon_discount' =>  $check->coupon_discount,
            ]);
            return back()->with('cart_quantity','Coupon Applied Successfully!');

        }else {
            return back()->with('cart_quantity','Invalid Coupon');
        }
       
    }




}
