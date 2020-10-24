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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('category','CategoryController');
Route::resource('subcategory','SubCategoryController');
Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('/', 'Productcontroller@index')->name('product.index');
    Route::get('/create', 'Productcontroller@create')->name('product.create');
    Route::post('/', 'Productcontroller@store')->name('product.store');
    Route::get('/edit/{id}', 'Productcontroller@edit')->name('product.edit');
    Route::put('/{id}', 'Productcontroller@update')->name('product.update');
    Route::delete('/{id}', 'Productcontroller@destroy')->name('product.destroy');
});
Route::resource('variant','VariantController');
Route::prefix('shop')->group(function(){
   Route::get('/','StoreController@index')->name('store.index');
   Route::get('/product/{product}','StoreController@product')->name('store.product.show');
   Route::get('/category/{category}','StoreController@category')->name('store.category');
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
Route::resource('page','PageController');
