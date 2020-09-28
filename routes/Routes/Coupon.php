<?php 

    Route::get('admin/coupon','Backend\CouponController@coupon')->name('admin.coupon');
    Route::post('admin/coupon/add','Backend\CouponController@add_coupon')->name('admin.coupon.add');
    Route::get('admin/coupon/edit/{id}','Backend\CouponController@edit_coupon');
    Route::post('admin/coupon/update','Backend\CouponController@update_coupon')->name('admin.coupon.update');
    Route::get('admin/coupon/delete/{id}','Backend\CouponController@delete_coupon');
    Route::get('admin/coupon/inactive/{id}','Backend\CouponController@inactive_coupon');
    Route::get('admin/coupon/active/{id}','Backend\CouponController@active_coupon');