<?php 

    Route::get('admin/product','Backend\ProductController@product')->name('admin.product');
    Route::get('admin/product/add','Backend\ProductController@add_product_show')->name('admin.product.add.show');
    Route::post('admin/product/store','Backend\ProductController@add_product')->name('admin.product.add');
    Route::get('admin/product/delete/{id}','Backend\ProductController@delete_product');
    Route::get('admin/product/inactive/{id}','Backend\ProductController@inactive_product');
    Route::get('admin/product/active/{id}','Backend\ProductController@active_product');
    Route::get('admin/product/edit/{id}','Backend\ProductController@edit_product');
    Route::post('admin/product/update/data','Backend\ProductController@update_product_data')->name('admin.product.update.data');
    Route::post('admin/product/update/image1','Backend\ProductController@update_product_image1')->name('admin.product.image_1');
    Route::post('admin/product/update/image2','Backend\ProductController@update_product_image2')->name('admin.product.image_2');
    Route::post('admin/product/update/image3','Backend\ProductController@update_product_image3')->name('admin.product.image_3');