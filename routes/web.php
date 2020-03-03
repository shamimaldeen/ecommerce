<?php
Route::get('/', 'HomeController@index');
Route::get('/contact', 'HomeController@contact');
Route::get('/page/{id}/{slug?}', 'HomeController@page');
Route::get('search/price/{start?}/{end?}', 'HomeController@search_by_price');
Route::get('search/{keywords?}', 'HomeController@search');


Route::prefix('customer')->group(function () {
    Route::get('signup','Front\CustomerController@sign_up');
    Route::post('register','Front\CustomerController@register');
    Route::get('login','Front\CustomerController@loginview');
    Route::post('loginaction','Front\CustomerController@loginaction');
    Route::get('logout','Front\CustomerController@logout');
    Route::get('wishlist','Front\CustomerController@wish');
    Route::get('wish/add/product/{id}','Front\CustomerController@addwish');
    Route::get('wish/delete/{id}','Front\CustomerController@deletewish');
});

Route::prefix('product')->group(function () {
    Route::get('/','Front\ProductFront@index');
    Route::get('view/{id}/{slug?}','Front\ProductFront@view');
    Route::get('featured','Front\ProductFront@featured');
    Route::get('new_arrival','Front\ProductFront@new_arrival');
    Route::get('hot_deals','Front\ProductFront@hot_deals');
    Route::get('offer','Front\ProductFront@offer');
    Route::get('category','Front\ProductFront@category'); //for skipping error
    Route::get('category/{id}/{slug?}','Front\ProductFront@category')->where(['id' => '[0-9]+']);
    Route::get('search/{id}/{slug?}','Front\ProductFront@category')->where(['id' => '[0-9]+']);
    //Route::get('brands','Front\ProductFront@brand'); 
    Route::get('brand/{id}/{slug?}','Front\ProductFront@brand'); 
});

Route::prefix('cart')->group(function () {
    Route::get('/','CartController@index');
    //Route::post('add/product/{id}','CartController@add');
    Route::get('add/product/{id}','CartController@add');
    Route::post('add/product/{id}','CartController@add');
    Route::post('edit/product/{id}','CartController@edit');
    Route::get('delete/{id}','CartController@delete');
});

Route::prefix('order')->group(function () {
    Route::post('placeorder','OrderController@placeorder');
    Route::get('confirmation/{orderid}','OrderController@order_confirmation')->where(['id' => '[0-9]+']);;
});


Route::match(['get', 'post'], 'admin', 'AdminController@login');
Route::prefix('admin')->group(function () { //inside admin login
    
    Route::group(['middleware' => ['auth']], function () {

        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('site','AdminController@site')->name('site');
        Route::match(['get', 'post'], 'site', 'AdminController@site')->name('site');

        Route::prefix('product')->group(function () {
            Route::get('category', 'CategoryController@index');
            Route::post('category/add', 'CategoryController@store');
            Route::get('cat/edit/{id}', 'CategoryController@edit');
            Route::post('cat/update/{id}', 'CategoryController@update');
            Route::get('cat/delete/{id}', 'CategoryController@delete');
            Route::get('brand', 'BrandController@index');
            Route::post('brand/add', 'BrandController@store');
            Route::get('brand/edit/{id}', 'BrandController@edit');
            Route::post('brand/update/{id}', 'BrandController@update');
            Route::get('brand/delete/{id}', 'BrandController@delete');
            Route::get('color', 'ColorController@index');
            Route::post('color/add', 'ColorController@store');
            Route::get('color/edit/{id}', 'ColorController@edit');
            Route::post('color/update/{id}', 'ColorController@update');
            Route::get('color/delete/{id}', 'ColorController@delete');
            Route::get('add', 'ProductController@add');
            Route::post('save', 'ProductController@store');
            Route::get('archive', 'ProductController@archive');
            Route::post('update/{id}', 'ProductController@update'); //id, cat,brand,color
            Route::get('delete/{i}', 'ProductController@delete'); //id, cat,brand,color
        });
        Route::get('proedit/{i}/{ca}/{b}/{cl}', 'ProductController@edit'); //id, cat,brand,color
        
        Route::match(['get', 'post'], 'slider', 'AdminController@slider');
        Route::get('slider/delete/{id}', 'AdminController@slider_delete');

        Route::prefix('order')->group(function () {
            Route::get('pending', 'OrderController@order_pending');
            Route::get('delivered', 'OrderController@order_delivered');
            Route::get('view/{id}', 'OrderController@order_view');
            Route::post('change_status/{id}', 'OrderController@change_status');
            Route::get('delete/{id}', 'OrderController@order_delete');
            Route::get('product/delete/{id}', 'OrderController@orderpro_delete');
            Route::get('report', 'OrderController@report');
            Route::get('report/action', 'OrderController@action');
        });

        Route::match(['get', 'post'], 'transaction/category', 'TransactionController@category');

        Route::prefix('transaction')->group(function () {
            Route::get('cat/del/{i}', 'TransactionController@category_delete');
            Route::get('archive', 'TransactionController@transaction_archive');
            Route::get('add', 'TransactionController@transaction_add');
            Route::post('save', 'TransactionController@transaction_save');
            Route::get('edit/{id}', 'TransactionController@transaction_edit');
            Route::post('update/{id}', 'TransactionController@transaction_update');
            Route::get('delete/{id}', 'TransactionController@transaction_delete');
        });

        Route::prefix('customer')->group(function () {
            Route::get('/','CustomerController@index');
        });

        
        Route::resource('page', 'PageController', ['except' => ['create','show','store','destroy', 'update']]);
        Route::post('page/update/{id}', 'PageController@update');
    });

    Route::get('logout', 'AdminController@logout');
});



Auth::routes();

//https://www.youtube.com/watch?v=TILCwtTtmWA&list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7&index=9
//Route::get('/home', 'HomeController@index')->name('home');