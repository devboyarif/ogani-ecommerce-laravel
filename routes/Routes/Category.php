<?php

    Route::get('admin/category','Backend\CategoryController@category')->name('admin.category');
    Route::post('admin/category/add','Backend\CategoryController@add_category')->name('admin.category.add');
    Route::get('admin/category/edit/{id}','Backend\CategoryController@edit_category');
    Route::post('admin/category/update','Backend\CategoryController@update_category')->name('admin.category.update');
    Route::get('admin/category/delete/{id}','Backend\CategoryController@delete_category');
    Route::get('admin/category/inactive/{id}','Backend\CategoryController@inactive_category');
    Route::get('admin/category/active/{id}','Backend\CategoryController@active_category');