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

//home page
Route::get('/home', 'HomeController@index')->name('home');

//category pages
Route::get('/category/{id}', 'CategoriesController@category')->name('category');

//brand pages
Route::get('/brand/{id}/category/{category_id}', 'BrandsController@brand')->name('brand');

//countries pages
Route::get('/country/{id}/category/{category_id}', 'CountriesController@country')->name('country');

//product view
Route::group(['prefix' => 'product'], function () {
    Route::get('/{id}', 'ProductController@productView')->name('product.view');
});

//basket functions
Route::post('/addProductToBasket', 'BasketController@addProductToBasket')->name('addProductToBasket');
Route::get('/getBasket', 'BasketController@getBasket')->name('getBasket');
Route::get('/fetchBasketProducts', 'BasketController@fetchBasketProducts')->name('fetchBasketProducts');

Route::post('/changeQuantityProductInBasket', 'BasketController@changeQuantityProductInBasket')->name('changeQuantityProductInBasket');
Route::post('/removeOneProductFromBasket', 'BasketController@removeOneProductFromBasket')->name('removeOneProductFromBasket');
Route::post('/removeAllBasket', 'BasketController@removeAllBasket')->name('removeAllBasket');

//checkout
Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::get('/getRegions', 'CheckoutController@getRegions')->name('getRegions');
Route::get('/getRegionCities', 'CheckoutController@getRegionCities')->name('getRegionCities');
Route::get('/getPostalOffices', 'CheckoutController@getPostalOffices')->name('getPostalOffices');
Route::post('/submitCheckout', 'CheckoutController@submitCheckout')->name('submitCheckout');

Route::get('/checkout/success/{id}', 'CheckoutController@success')->name('success');

//global functions
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//admin pages
Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/', 'AdminController@home')->name('admin_home');
    Route::get('/icons', 'AdminController@icons')->name('admin_icons');
    Route::get('/products', 'AdminController@products')->name('admin_products');
    Route::get('/productsAttributes', 'AdminController@productAttributes')->name('admin_product_attributes');
    Route::get('/categories', 'AdminController@categories')->name('admin_categories');
    Route::get('/brands', 'AdminController@brands')->name('admin_brands');
    Route::get('/countries', 'AdminController@countries')->name('admin_countries');
    Route::get('/bar_menus', 'AdminController@barMenus')->name('admin_barMenus');
    Route::get('/banners', 'AdminController@banners')->name('admin_banners');

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

    Route::namespace('Admin')->prefix('order')->group(function () {
        Route::post('/{id}', 'OrderController@viewOrder')->name('admin.view.order');
    });

    Route::namespace('Admin')->prefix('banner')->group(function () {
        Route::post('/get', 'BannersController@getBanners')->name('admin_banner_get');
        Route::get('/create', 'BannersController@create')->name('admin_banner_create');
        Route::post('/createAttribute', 'BannersController@createBanner')->name('admin_banner_create_post');
        Route::get('/edit/{id}', 'BannersController@edit')->name('admin_banner_edit');
        Route::post('/editAttribute/{id}', 'BannersController@editBanner')->name('admin_banner_edit_post');
        Route::get('/delete/{id}', 'BannersController@delete')->name('admin_banner_delete');
        Route::post('/fetchBannerRelations', 'BannersController@fetchBannerRelations')->name('admin_banner_fetch_relation');
    });
});
