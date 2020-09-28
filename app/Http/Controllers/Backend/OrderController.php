<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Shiping;
// use App\Models\Cart;
// use App\Models\Payment;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetails;
// use Session;
// use Carbon\Carbon;

class OrderController extends Controller
{

    //======== Order Page Show=======
   function orders(){
       $orders = Order::where('status',1)->latest()->paginate(20);
       return view('admin.Orders.orders',compact('orders'));
   }

    //======== Order Complete Page Show=======
   function total_orders_complete(){
       $orders = Order::where('status','!=','1')->latest()->paginate(20);
       return view('admin.Orders.orders_complete',compact('orders'));
   }

    //======== View Specific Order =======
   function order_view($order_id){
       
        $order = Order::findOrFail($order_id);
        $order_details = OrderDetails::where('order_id',$order->id)->get();
        return view('admin.Orders.order_view',compact('order','order_details'));

   }

 //======== Order Mark as Paid =======
   function paid_order($id){
        $order = Order::findOrFail($id)->update([
            'order_status' => 'paid'
        ]);
        return back()->with('success','Order marked as paid successfully!');
   }

    //======== Order Mark as Unpaid =======
   function unpaid_order($id){
        $order = Order::findOrFail($id)->update([
            'order_status' => 'pending'
        ]);
        return back()->with('error','Order marked as unpaid successfully!');
   }

    //========  Order Mark as Complete  =======
   function complete_order($id){

        $order = Order::where('id',$id)->update([
            'status' => 2
        ]);
        return back()->with('successs','Order marked as complete successfully!');
   }
   //========  Order Mark as Incomplete  =======
   function incomplete_order($id){

        $order = Order::where('id',$id)->update([
            'status' => 1
        ]);
        return back()->with('success','Order marked as incomplete successfully!');
   }
}
