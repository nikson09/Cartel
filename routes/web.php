<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'CategoriesController@category')->name('category');
Route::get('/brand/{id}/category/{category_id}', 'BrandsController@brand')->name('brand');
Route::get('/country/{id}/category/{category_id}', 'CountriesController@country')->name('country');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@home')->name('admin_home');
    Route::get('/icons', 'AdminController@icons')->name('admin_icons');
    Route::get('/products', 'AdminController@products')->name('admin_products');
    Route::get('/productsAttributes', 'AdminController@productAttributes')->name('admin_product_attributes');
    Route::get('/categories', 'AdminController@categories')->name('admin_categories');
    Route::get('/brands', 'AdminController@brands')->name('admin_brands');
    Route::get('/countries', 'AdminController@countries')->name('admin_countries');
    Route::get('/bar_menus', 'AdminController@barMenus')->name('admin_barMenus');

    Route::namespace('Admin')->prefix('product')->group(function () {
        Route::post('/get', 'ProductController@getProducts')->name('admin_product_get');
        Route::get('/create', 'ProductController@create')->name('admin_product_create');
        Route::post('/createProduct', 'ProductController@createProduct')->name('admin_product_create_post');
        Route::get('/edit/{id}', 'ProductController@edit')->name('admin_product_edit');
        Route::post('/editProduct/{id}', 'ProductController@editProduct')->name('admin_product_edit_post');
        Route::get('/delete/{id}', 'ProductController@delete')->name('admin_product_delete');
    });

    Route::namespace('Admin')->prefix('product_attribute')->group(function () {
        Route::post('/get', 'ProductAttributesController@getAttributes')->name('admin_product_attributes_get');
        Route::get('/create', 'ProductAttributesController@create')->name('admin_product_attributes_create');
        Route::post('/createAttribute', 'ProductAttributesController@createAttribute')->name('admin_product_attributes_create_post');
        Route::get('/edit/{id}', 'ProductAttributesController@edit')->name('admin_product_attributes_edit');
        Route::post('/editAttribute/{id}', 'ProductAttributesController@editAttribute')->name('admin_product_attributes_edit_post');
        Route::get('/delete/{id}', 'ProductAttributesController@delete')->name('admin_product_attributes_delete');
    });

    Route::namespace('Admin')->prefix('categories')->group(function () {
        Route::post('/get', 'CategoriesController@getCategories')->name('admin_categories_get');
        Route::get('/create', 'CategoriesController@create')->name('admin_categories_create');
        Route::post('/createAttribute', 'CategoriesController@createCategory')->name('admin_categories_create_post');
        Route::get('/edit/{id}', 'CategoriesController@edit')->name('admin_categories_edit');
        Route::post('/editAttribute/{id}', 'CategoriesController@editCategory')->name('admin_categories_edit_post');
        Route::get('/delete/{id}', 'CategoriesController@delete')->name('admin_categories_delete');
    });

    Route::namespace('Admin')->prefix('brands')->group(function () {
        Route::post('/get', 'BrandsController@getBrands')->name('admin_brands_get');
        Route::get('/create', 'BrandsController@create')->name('admin_brands_create');
        Route::post('/createAttribute', 'BrandsController@createBrand')->name('admin_brands_create_post');
        Route::get('/edit/{id}', 'BrandsController@edit')->name('admin_brands_edit');
        Route::post('/editAttribute/{id}', 'BrandsController@editBrand')->name('admin_brands_edit_post');
        Route::get('/delete/{id}', 'BrandsController@delete')->name('admin_brands_delete');
    });

    Route::namespace('Admin')->prefix('countries')->group(function () {
        Route::post('/get', 'CountriesController@getCountries')->name('admin_countries_get');
        Route::get('/create', 'CountriesController@create')->name('admin_countries_create');
        Route::post('/createAttribute', 'CountriesController@createCountry')->name('admin_countries_create_post');
        Route::get('/edit/{id}', 'CountriesController@edit')->name('admin_countries_edit');
        Route::post('/editAttribute/{id}', 'CountriesController@editCountry')->name('admin_countries_edit_post');
        Route::get('/delete/{id}', 'CountriesController@delete')->name('admin_countries_delete');
    });

    Route::namespace('Admin')->prefix('bar_menus')->group(function () {
        Route::post('/get', 'BarMenuController@getBarMenus')->name('admin_barMenus_get');
        Route::get('/create', 'BarMenuController@create')->name('admin_barMenus_create');
        Route::post('/createBarMenu', 'BarMenuController@createBarMenu')->name('admin_barMenus_create_post');
        Route::get('/edit/{id}', 'BarMenuController@edit')->name('admin_barMenus_edit');
        Route::post('/editBarMenu/{id}', 'BarMenuController@editBarMenu')->name('admin_barMenus_edit_post');
        Route::get('/delete/{id}', 'BarMenuController@delete')->name('admin_barMenus_delete');
    });
});
