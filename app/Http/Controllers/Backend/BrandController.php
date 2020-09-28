<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;
class BrandController extends Controller
{
    
    //========Brand Show=======
    function brand(){
        $brand = Brand::latest()->paginate(10);
        return view('admin.Brand.brand',compact('brand'));
    }
    //========Brand Add=======
    function add_brand(){
        request()->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ],[
            'brand_name.required' => 'Please Provide Brand Name!'
        ]);

        Brand::create([
            'brand_name' => request()->brand_name,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success','Brand Added Successfully!');
    
    }

    //========Brand Edit=======
    function edit_brand($id){
        $brand_edit = Brand::find($id);
        return view('admin.Brand.brand_edit',compact('brand_edit'));
    
    }

    //========Brand Update=======
    function update_brand(){
        request()->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ],[
            'brand_name.required' => 'Please Provide Brand Name!'
        ]);
        Brand::find(request()->brand_id)->update([
        'brand_name' => request()->brand_name,
        ]);       
        return redirect('/admin/brand')->with('update_success','Brand Updated Successfully!');
        
    }

    //========Brand Delete=======
    function delete_brand($id){
        Brand::find($id)->delete();
        return redirect('/admin/brand')->with('delete_success','Brand Deleted Successfully!');
        
    }

    //========Brand Inactive=======
    function inactive_brand($id){
        Brand::find($id)->update([
            'status' => 2
        ]);
        return redirect('/admin/brand')->with('brand_inactive','Brand Inactive Successfully!');
        
    }

    //========Brand Active=======
    function active_brand($id){
        Brand::find($id)->update([
            'status' => 1
        ]);
        return redirect('/admin/brand')->with('brand_active','Brand Active Successfully!');
    }




}
