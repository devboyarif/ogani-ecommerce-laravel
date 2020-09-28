<?php

    Route::get('admin/orders','Backend\OrderController@orders')->name('admin.orders');
    Route::get('admin/orders/total/complete','Backend\OrderController@total_orders_complete')->name('admin.orders.complete');
    Route::get('admin/orders/view/{order_id}','Backend\OrderController@order_view');
    Route::get('admin/orders/paid/{id}','Backend\OrderController@paid_order');
    Route::get('admin/orders/unpaid/{id}','Backend\OrderController@unpaid_order');
    Route::get('admin/orders/complete/{id}','Backend\OrderController@complete_order');
    Route::get('admin/orders/incomplete/{id}','Backend\OrderController@incomplete_order');
