<?php

Route::post(sha1('/checkout/done'),'Frontend\PaymentController@checkout_done')->name('checkout.done');
Route::post('/order/place','Frontend\PaymentController@order_place')->name('order.place');