<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shiping;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetails;
use Session;
use Carbon\Carbon;


class PaymentController extends Controller
{

    // Order Shipping 
    function checkout_done(){
        
      if(request('user_ip') == request()->ip()){

                request()->validate([
                     'fname' => 'required',
                     'lname' => 'required',
                     'address' => 'required',
                     'town' => 'required',
                     'country' => 'required',
                     'zip' => 'required',
                     'phone' => 'required|numeric',
                     'email' => 'required',
                ],[
                    'fname.required' => 'The first name is required',
                     'lname.required' => 'The last name is required',
                ]);

            $shipping = Shiping::create([
                'fname' => request('fname'),
                'lname' => request('lname'),
                'address' => request('address'),
                'town' => request('town'),
                'country' => request('country'),
                'zip' => request('zip'),
                'phone' => request('phone'),
                'email' => request('email'),
                'user_id' => request('user_id'),
                'user_ip' => request('user_ip'),
            ]);

            Session::put('shipping_id',$shipping->id);
            $cart = Cart::where('user_id',request('user_id'))->latest()->get();     
            return view('users.pages.Payment.payment',compact('cart'));
      }

        
   }

   // Order Place  
   function order_place(){
   
        $shipping_id = Session::get('shipping_id');
        $user_id = Session::get('user_id');

    
        $payment = Payment::create([
            'payment_method' => request('payment_method'),
            'payment_status' => 'pending',
            'transaction_no' => request('transaction_no'),
            'shipping_id' => $shipping_id,
            'user_id' => $user_id,
            'created_at' => Carbon::now(),         
        ]);

        $order = Order::create([
            'user_id' =>  $user_id,
            'shipping_id' => $shipping_id,
            'payment_id' =>  $payment->id,
            'order_total' => request()->order_total,
            'order_status' => 'pending',
            'created_at' => Carbon::now(),
        ]);
    
        $cart = Cart::where('user_id',$user_id)->latest()->get();     

        foreach ($cart as $content) {
            OrderDetails::create([
                'order_id' =>$order->id,
                'user_id' => $user_id,
                'product_id' => $content->product_id,
                'product_price' => $content->product_price,
                'product_sales_quantity' => $content->product_quantity,
                'created_at' => Carbon::now(),
            ]);
        }
        
        Cart::where('user_id',$user_id)->delete();  
        return redirect()->route('order_success')->with('order_complete','Your order is successfully complete.');


   }














}
