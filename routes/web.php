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
