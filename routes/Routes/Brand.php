<?php 

    Route::get('admin/brand','Backend\BrandController@brand')->name('admin.brand');
    Route::post('admin/brand/add','Backend\BrandController@add_brand')->name('admin.brand.add');
    Route::get('admin/brand/edit/{id}','Backend\BrandController@edit_brand');
    Route::post('admin/brand/update','Backend\BrandController@update_brand')->name('admin.brand.update');
    Route::get('admin/brand/delete/{id}','Backend\BrandController@delete_brand');
    Route::get('admin/brand/inactive/{id}','Backend\BrandController@inactive_brand');
    Route::get('admin/brand/active/{id}','Backend\BrandController@active_brand');