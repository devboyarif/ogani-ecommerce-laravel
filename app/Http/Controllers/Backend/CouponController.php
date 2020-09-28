<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
class CouponController extends Controller
{
     //========Coupon Show=======
     function coupon(){
        $coupon = Coupon::latest()->paginate(10);
        return view('admin.Coupon.coupon',compact('coupon'));
    }
    //========coupon Add=======
    function add_coupon(){
        request()->validate([
            'coupon_name' => 'required|unique:coupons,coupon_name',
            'coupon_discount' => 'required',
        ],[
            'coupon_name.required' => 'Please Provide Coupon Name!',
            'coupon_discount.required' => 'Please Provide Coupon Discount!'
        ]);

        Coupon::create([
            'coupon_name' => request()->coupon_name,
            'coupon_discount' => request()->coupon_discount,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success','Coupon Added Successfully!');
    
    }

    //========coupon Edit=======
    function edit_coupon($id){
        $coupon_edit = Coupon::find($id);
        return view('admin.Coupon.coupon_edit',compact('coupon_edit'));
    
    }

    //========coupon Update=======
    function update_coupon(){
        request()->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required'
        ],[
            'coupon_name.required' => 'Please Provide coupon Name!',
            'coupon_discount.required' => 'Please Provide coupon Discount!'
        ]);
        Coupon::find(request()->coupon_id)->update([
            'coupon_name' => request()->coupon_name,
            'coupon_discount' => request()->coupon_discount,
        ]);       
        return redirect('/admin/coupon')->with('update_success','Coupon Updated Successfully!');
        
    }

    //========coupon Delete=======
    function delete_coupon($id){
        Coupon::find($id)->delete();
        return redirect('/admin/coupon')->with('delete_success','Coupon Deleted Successfully!');
        
    }

    //========coupon Inactive=======
    function inactive_coupon($id){
        Coupon::find($id)->update([
            'status' => 2
        ]);
        return redirect('/admin/coupon')->with('coupon_inactive','Coupon Inactive Successfully!');
        
    }

    //========coupon Active=======
    function active_coupon($id){
        Coupon::find($id)->update([
            'status' => 1
        ]);
        return redirect('/admin/coupon')->with('coupon_active','Coupon Active Successfully!');
    }



}
