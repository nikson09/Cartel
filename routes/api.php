<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/getProduct', 'ProductController@getProduct')->name('get_product');
Route::post('/addDiscountPercent', 'Admin\ProductController@addDiscountPercent')->name('add_discount_percent');
Route::post('/deleteDiscountPercent', 'Admin\ProductController@deleteDiscountPercent')->name('delete_discount_percent');
