<?php

    Route::post('cart/add/{product_id}','Backend\CartController@addCart');
    Route::get('cart/quantity','Backend\CartController@total_quantity');
    Route::get('cart/total/price','Backend\CartController@total_price');
    Route::get('cart/{user_id}','Backend\CartController@show_Cart_page');
    Route::post('cart/quantity/update/{id}','Backend\CartController@quantity_update_Cart');
    Route::get('cart/destroy/{id}','Backend\CartController@destroyCart');
    Route::post('coupon/apply','Backend\CartController@apply_coupon');
