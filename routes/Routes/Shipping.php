<?php

Route::get('/shipping_details/{user_id}','Frontend\ShippingController@shipping_details')->name('shipping_details');

// payment routes 
Route::post(sha1('/checkout/done'),'Frontend\ShippingController@checkout_done')->name('checkout.done');
Route::post('/order/place','Frontend\ShippingController@checkout_done')->name('order.place');