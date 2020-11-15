<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'StoreController@landing_page')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
Route::resource('category','CategoryController');
Route::resource('subcategory','SubCategoryController');
Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::post('/', 'ProductController@store')->name('product.store');
    Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::put('/{id}', 'ProductController@update')->name('product.update');
    Route::delete('/{id}', 'ProductController@destroy')->name('product.destroy');
});
Route::resource('variant','VariantController');
Route::prefix('shop')->group(function(){
   Route::get('/','StoreController@index')->name('store.index');
   Route::get('/product/{product}','StoreController@product')->name('store.product.show');
   Route::get('/category/{category}','StoreController@category')->name('store.category');
   Route::get('/sub_category/{sub_category}','StoreController@subcategory')->name('store.subcategory');
});
Route::prefix('cart')->group(function(){
   Route::get('/', 'CartController@index')->name('cart.index');
   Route::post('/add_product/{product}', 'CartController@add_product')->name('cart.product.add');
   Route::post('/update_item/{product}', 'CartController@update_item')->name('cart.product.update');
   Route::delete('/remove_item/{product}', 'CartController@remove_item')->name('cart.product.remove');
   Route::post('/update', 'CartController@update_cart')->name('cart.update');
});
Route::get('search','SearchController@index')->name('search.index');
Route::get('search/fetch','SearchController@fetch')->name('search.fetch');
Route::resource('shipping_method','ShippingMethodController');
Route::resource('payment_method','PaymentMethodController');
Route::get('users_list', 'UsersListController@index')->name('user.list');
Route::prefix('transaction')->group(function(){
    Route::get('/','TransactionController@index')->name('transaction.index');
});
Route::prefix('checkout')->group(function(){
   Route::get('create','CheckoutController@create')->middleware('cart')->name('checkout.create');
   Route::post('/','CheckoutController@store')->name('checkout.store');
   Route::get('complete','CheckoutController@complete')->middleware('order')->name('checkout.complete');
});
Route::prefix('admin')->group(function(){
   Route::get('/dashboard','Admin\HomeController@index')->name('admin.dashboard');
   Route::prefix('order')->group(function (){
     Route::get('/','Admin\OrderController@index')->middleware('auth')->name('admin.order.index');
     Route::get('/{order}','Admin\OrderController@show')->middleware('auth')->name('admin.order.show');
     Route::get('/{order}/invoice','Admin\OrderController@invoice')->middleware('auth')->name('admin.order.invoice');
   });
});
Route::prefix('customer')->group(function(){
   Route::prefix('order')->group(function(){
      Route::get('/','Customer\OrderController@index')->name('customer.order.index');
      Route::get('/{order}','Customer\OrderController@show')->name('customer.order.show');
      Route::get('/{order}/invoice','Customer\OrderController@invoice')->name('customer.order.invoice');
   });
});
Route::prefix('page')->group(function(){
   Route::get('/','PageController@index')->middleware('auth')->name('page.index');
   Route::post('/','PageController@store')->middleware('auth')->name('page.store');
   Route::get('/edit/{url}','PageController@edit')->middleware('auth')->name('page.edit');
   Route::get('/create','PageController@create')->middleware('auth')->name('page.create');
   Route::put('/{url}','PageController@update')->middleware('auth')->name('page.update');
   Route::delete('/{url}','PageController@destroy')->middleware('auth')->name('page.destroy');
   Route::get('/{url}','PageController@show')->name('page.show');
});
Route::get('oauth/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');
