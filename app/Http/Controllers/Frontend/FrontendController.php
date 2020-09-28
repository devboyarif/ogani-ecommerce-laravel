<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Contact;
use Session;
use Crypt;
class FrontendController extends Controller
{
    // Main root 
    function index(){
        $product = Product::where('status',1)->latest()->get();
        $category = Category::where('status',1)->latest()->get();
        return view('users.pages.index',compact('product','category'));
    }

    // Customer Login Page Show
    function user_login_show(){
        return view('users.pages.user_login');
    }

    // Customer Logout
    function user_logout(){
        Session::flush();
        return back()->with('success',"You're successfully logged out!");
    }

    // All Product Show in root
    function all_products(){

        $product = Product::where('status',1)->latest()->paginate(10);
        $total_product = Product::where('status',1)->count();
        return view('users.pages.Details.all_products',compact('product','total_product'));
    }

    // Category Wise Product Show
    function categories_collection($cat_id){

        $product = Product::where('category_id',decrypt($cat_id))->where('status',1)->latest()->paginate(10);
        $total_product = Product::where('category_id',decrypt($cat_id))->where('status',1)->count();
        return view('users.pages.Details.category_products',compact('product','total_product'));
    }

    // Specific Product Details
    function product_details($product_id){     
        $item = Product::where('id',Crypt::decrypt($product_id))->first();
        $cat_id =  $item->category_id;
        // $related_product = Product::where('category_id', $cat_id)->latest()->get();
        $related_product = Product::where('category_id', $cat_id)->where('id','!=',Crypt::decrypt($product_id))->latest()->get();
        return view('users.pages.Details.product_details',compact('item','related_product'));
    }

    // Contact Page Show
    function contact(){
        return view('users.pages.Contact.contact');
    }

     // Send Contact Form Messages
    function contact_message(){
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'message' =>'required',
        ]);
        Contact::create([
            'name' => request('name'),
            'email' => request('email'),
            'message' => request('message'),
        ]);

        return back()->with('message_sent','Your message is successfully sent!');
    }



    // Order Success Page Show
     function oder_success(){
         return view('users.pages.oder_success');
     }



}
