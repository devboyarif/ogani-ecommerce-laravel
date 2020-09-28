<?php

    Route::post('wishlist/add/{product_id}','Backend\WishlistController@addWishlist');
    Route::get('wishlist/count','Backend\WishlistController@getWishlist');
    Route::get('wishlist/{user_id}','Backend\WishlistController@show_wishlist_page')->name('wishlist_page');
    Route::get('wish/destroy/{id}','Backend\WishlistController@destroyWish');
  
