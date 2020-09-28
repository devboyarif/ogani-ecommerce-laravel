<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*-------------------------------------------------------------------------
 Frontend Routes
--------------------------------------------------------------------------*/
    Route::get('/', 'Frontend\FrontendController@index');
    Route::get('/product_details/{product_id}', 'Frontend\FrontendController@product_details');
    Route::get('/all_products', 'Frontend\FrontendController@all_products');
    Route::get('/categories/{cat_id}', 'Frontend\FrontendController@categories_collection');
    Route::get('/contact', 'Frontend\FrontendController@contact');
    Route::post('/contact/message', 'Frontend\FrontendController@contact_message')->name('contact_messages');

    //========Coupon Routes=======
    
    require_once('Routes/Coupon.php');
    
    //========Cart Routes=======
    
    require_once('Routes/Cart.php');
    
    //========Wishlist Routes=======
    
    require_once('Routes/Wishlist.php');
    
    //========Shipping Routes=======
    
    require_once('Routes/Shipping.php');
    
    //========Payment Routes=======
    
    require_once('Routes/Payment.php');
    
    //========Order Success=======
    Route::get(sha1('/order/done'), 'Frontend\FrontendController@oder_success')->name('order_success');




/*-------------------------------------------------------------------------
 Backend Routes
--------------------------------------------------------------------------*/

    //========Auth Routes=======

    require_once('Routes/Auth.php');

    //========Category Routes=======

    require_once('Routes/Category.php');
    
    //========Brand Routes=======
    
    require_once('Routes/Brand.php');

    //========Product Routes=======

    require_once('Routes/Product.php');
    //========Orders Routes=======

    require_once('Routes/Orders.php');
    
