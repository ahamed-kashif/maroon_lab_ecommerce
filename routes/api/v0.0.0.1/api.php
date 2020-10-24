<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:api')->delete('/product/{product_id}/image/{image_id}', 'ProductController@destroy_image')->name('product.image.destroy');
Route::middleware('auth:api')->put('admin/order/{order_id}/confirm', 'Admin\OrderController@confirm')->name('admin.order.confirm');
Route::middleware('auth:api')->put('admin/order/{order_id}/shipping_status', 'Admin\OrderController@tracking')->name('admin.order.shipping.status');
