<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;
use Image;
use File;
class ProductController extends Controller
{
    
        //========Manage Product Show=======
        function product(){
            $product = Product::latest()->paginate(10);
            return view('admin.Product.product',compact('product'));
        }
        //========Product Show=======
        function add_product_show(){
            $categories = Category::latest()->get();
            $brands = Brand::latest()->get();
            return view('admin.Product.add_product',compact('categories','brands'));
        }
        
        //========product Add=======
        function add_product(){
           
            request()->validate([
                'product_name' => 'required|unique:products,product_name',
                'product_code' => 'required|unique:products,product_code',
                'product_price' => 'required',
                'product_quantity' => 'required',
                'category_name' => 'required',
                'brand_name' => 'required',
                'product_image_1' => 'required|mimes:png,jpg,jpeg,gif',
                'product_image_2' => 'required|mimes:png,jpg,jpeg,gif',
                'product_image_3' => 'required|mimes:png,jpg,jpeg,gif',
                'short_description' => 'required',
                'long_description' => 'required',
                
            ],[
                'product_name.required' => 'Please Provide Product Name!',
                'product_code.required' => 'Please Provide Product Code!',
                'product_price.required' => 'Please Provide Product Price!',
                'product_quantity.required' => 'Please Provide Product Quantity!',
                'category_name.required' => 'Please Provide Category Name!',
                'brand_name.required' => 'Please Provide Brand Name!',
                'product_image_1.required' => 'Please Provide Product Image Thumbnail!',
                'product_image_2.required' => 'Please Provide Product Image Two!',
                'product_image_3.required' => 'Please Provide Product Image Three!',
                'short_description.required' => 'Please Provide Product Short Description!',
                'long_description.required' => 'Please Provide Product Long Description!',
            ]);
            
            $image_one = request()->file('product_image_1');
            $filename = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            $a = Image::make($image_one)->resize(270,270)->save('user/img/product/uploads/'.$filename);
            $img_url = 'user/img/product/uploads/'.$filename;
           
            $image_two = request()->file('product_image_2');
            $filename_two = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(270,270)->save('user/img/product/uploads/'.$filename_two);
            $img_url_2 = 'user/img/product/uploads/'.$filename_two;
            
            $image_three = request()->file('product_image_3');           
            $filename_three = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(270,270)->save('user/img/product/uploads/'.$filename_three);
            $img_url_3 = 'user/img/product/uploads/'.$filename_three;
           
            Product::create([
                'product_name' => request('product_name'),
                'product_code' => request('product_code'),
                'product_price' => request('product_price'),
                'product_quantity' => request('product_quantity'),
                'product_slug' => strtolower(str_replace(' ','-',request('product_name'))),
                'category_id' => request('category_name'),
                'brand_id' => request('brand_name'),
                'product_image_1' =>  $img_url,
                'product_image_2' =>  $img_url_2,
                'product_image_3' =>  $img_url_3,
                'short_description' => request('short_description'),
                'long_description' => request('long_description'),
                'created_at' => Carbon::now(),
            ]);

            return back()->with('success','Product Added Successfully!');
        
        }

        //========product Edit=======
        function edit_product($id){
            $product_edit = Product::find($id);
            $categories = Category::latest()->get();
            $brands = Brand::latest()->get();
            return view('admin.product.product_edit',compact('product_edit','categories','brands'));
        
        }

        //========product Update=======
        function update_product_data(){

            request()->validate([
                'product_name' => 'required|unique:products,product_name',
                'product_code' => 'required|unique:products,product_code',
                'product_price' => 'required',
                'product_quantity' => 'required',
                'category_name' => 'required',
                'brand_name' => 'required',              
                'short_description' => 'required',
                'long_description' => 'required',
                
            ],[
                'product_name.required' => 'Please Provide Product Name!',
                'product_code.required' => 'Please Provide Product Code!',
                'product_price.required' => 'Please Provide Product Price!',
                'product_quantity.required' => 'Please Provide Product Quantity!',
                'category_name.required' => 'Please Provide Category Name!',
                'brand_name.required' => 'Please Provide Brand Name!',
                'short_description.required' => 'Please Provide Product Short Description!',
                'long_description.required' => 'Please Provide Product Long Description!',
            ]);
            
            Product::find(request()->product_id)->update([
                'product_name' => request('product_name'),
                'product_code' => request('product_code'),
                'product_price' => request('product_price'),
                'product_quantity' => request('product_quantity'),         
                'category_id' => request('category_name'),
                'brand_id' => request('brand_name'),             
                'short_description' => request('short_description'),
                'long_description' => request('long_description'),
            ]);   

            return redirect('/admin/product')->with('update_success_data','Product Data Updated Successfully!');
            
        }

        //========product Delete=======
        function delete_product($id){

            Product::find($id)->delete();
            return redirect('/admin/product')->with('delete_success','Product Deleted Successfully!');
            
        }

        //========product Inactive=======
        function inactive_product($id){
            Product::find($id)->update([
                'status' => 2
            ]);
            return redirect('/admin/product')->with('product_inactive','Product Inactive Successfully!');
            
        }

        //========Product Active=======
        function active_product($id){

            Product::find($id)->update([
                'status' => 1
            ]);
            return redirect('/admin/product')->with('product_active','Product Active Successfully!');
        }

        //========Product Image 1=======
        function update_product_image1(){    

            request()->validate([              
                'product_image_1' => 'required|mimes:png,jpg,jpeg,gif',
            ],[
                'product_image_1.required' => 'Please Provide Product Image Thumbnail!',
            ]);

            if (request()->file('product_image_1')) {   

                $image = Product::find(request()->product_id);
                $path = public_path()."/user/img/product/uploads/".$image->product_image_1;
                unlink(base_path('public/'.$image->product_image_1));
              
            }

            $image_one = request()->file('product_image_1');
            $filename = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            $a = Image::make($image_one)->resize(270,270)->save('user/img/product/uploads/'.$filename);
            $img_url = 'user/img/product/uploads/'.$filename;


           
            Product::find(request()->product_id)->update([
                'product_image_1' =>  $img_url,
            ]);

            return back()->with('product_image','Product Image Updated Successfully!');

        }

        //========Product Image 2=======

        function update_product_image2(){
           
            request()->validate([              
                'product_image_2' => 'required|mimes:png,jpg,jpeg,gif',
            ],[
                'product_image_2.required' => 'Please Provide Product Image Two!',
            ]);

            if (request()->file('product_image_2')) {   

                $image = Product::find(request()->product_id);
                $path = public_path()."/user/img/product/uploads/".$image->product_image_2;
                unlink(base_path('public/'.$image->product_image_2));
              
            }


            $image_two = request()->file('product_image_2');
            $filename_two = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(270,270)->save('user/img/product/uploads/'.$filename_two);
            $img_url_2 = 'user/img/product/uploads/'.$filename_two;
            
           
            Product::find(request()->product_id)->update([
                'product_image_2' =>  $img_url_2,
            ]);
          
            return back()->with('product_image','Product Image Updated Successfully!');
        }

        //========Product Image 3=======
        function update_product_image3(){
            
            request()->validate([              
                'product_image_3' => 'required|mimes:png,jpg,jpeg,gif',                             
            ],[
                'product_image_3.required' => 'Please Provide Product Image Three!',
            ]);

            if (request()->file('product_image_3')) {   

                $image = Product::find(request()->product_id);
                $path = public_path()."/user/img/product/uploads/".$image->product_image_3;
                unlink(base_path('public/'.$image->product_image_3));
              
            }
                      
            $image_three = request()->file('product_image_3');           
            $filename_three = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(270,270)->save('user/img/product/uploads/'.$filename_three);
            $img_url_3 = 'user/img/product/uploads/'.$filename_three;
            Product::find(request()->product_id)->update([
                'product_image_3' =>  $img_url_3,
            ]);
             
            return back()->with('product_image','Product Image Updated Successfully!');

        }






}
