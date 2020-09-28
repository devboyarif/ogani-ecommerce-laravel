<?php
    Auth::routes();
    Route::get('/home', 'Backend\BackendController@home');
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::get('admin/home', 'AdminController@index');
    Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin','Admin\LoginController@Login');
    
    
    //================ Frontend Auth==================
    Route::get('/user_login_show', 'Frontend\FrontendController@user_login_show');
    Route::get('/user_logout', 'Frontend\FrontendController@user_logout');