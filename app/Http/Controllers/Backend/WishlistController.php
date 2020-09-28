<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Crypt;
class WishlistController extends Controller
{

    // Add Product in wishlist
    function addWishlist($product_id){

        $check = Wishlist::where('product_id',$product_id)->where('user_id',request('user_id'))->first();
        if ($check) {
            echo json_encode(['status' => 'success','message' => "This product already added to wishlist"]);

        }else{

            $product = Product::find($product_id);
            
            Wishlist::create([
                'product_id' => $product_id,                        
                'user_ip' => request('user_ip'),
                'user_id' => request('user_id'),
            ]);

            echo json_encode(['status' => 'success','message' => "Wishlist Added Successfully"]);
        }

   }

    // Show Total wishlist Count 
    function getWishlist(){
        $wishlist = Wishlist::where('user_id',request('user_id'))->count();      
        return response()->json($wishlist);
    }
// Show wishlist Page 
   function show_wishlist_page($user_id){

       $wish = Wishlist::where('user_id',Crypt::decrypt($user_id))->latest()->get();
       return view('users.pages.Wishlist.wishlist_page',compact('wish'));
   }

    // Destroy Product from wishlist 
   function destroyWish($id){

        Wishlist::where('id',Crypt::decrypt($id))->delete();
        return back()->with('cart_quantity','Product Removed From Wishlist Successfully');
    }


}
