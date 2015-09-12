<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/payment',['middleware' => 'auth', 'as'=> 'payment', 'uses'=>'CheckoutController@charge']);

Route::get('/', ['as' => 'home', 'uses' => 'StoreController@index']);
Route::get('/home', ['as' => 'home', 'uses' => 'StoreController@index']);

Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);

Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
Route::post('cart/change', ['as' => 'store.cart.change', 'uses' => 'CartController@change']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('checkout/pay', ['as' => 'checkout.pay', 'uses' => 'CheckoutController@pay']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);

});

// Authentication routes
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth','authorize'], 'where' => ['id' => '[0-9]+']], function () {
    Route::get('/', ['as' => 'adminHome', 'uses' => 'Admin\AdminHomeController@index']);
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', ['as' => 'categories', 'uses' => 'Admin\CategoriesController@index']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'Admin\CategoriesController@create']);
        Route::post('store', ['as' => 'categories.store', 'uses' => 'Admin\CategoriesController@store']);
        Route::get('edit/{id}', ['as' => 'categories.edit', 'uses' => 'Admin\CategoriesController@edit']);
        Route::put('update/{id}', ['as' => 'categories.update', 'uses' => 'Admin\CategoriesController@update']);
        Route::get('destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'Admin\CategoriesController@destroy']);
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', ['as' => 'products', 'uses' => 'Admin\ProductsController@index']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'Admin\ProductsController@create']);
        Route::post('store', ['as' => 'products.store', 'uses' => 'Admin\ProductsController@store']);
        Route::get('edit/{id}', ['as' => 'products.edit', 'uses' => 'Admin\ProductsController@edit']);
        Route::put('update/{id}', ['as' => 'products.update', 'uses' => 'Admin\ProductsController@update']);
        Route::get('destroy/{id}', ['as' => 'products.destroy', 'uses' => 'Admin\ProductsController@destroy']);
        Route::group(['prefix' => 'images'], function () {
            Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'Admin\ProductsController@images']);
            Route::get('create/{id}/product', ['as' => 'products.images.create', 'uses' => 'Admin\ProductsController@createImage']);
            Route::post('store/{id}/product', ['as' => 'products.images.store', 'uses' => 'Admin\ProductsController@storeImage']);
            Route::get('destroy/{id}/image', ['as' => 'products.images.destroy', 'uses' => 'Admin\ProductsController@destroyImage']);
        });
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', ['as' => 'orders', 'uses' => 'Admin\OrdersController@index']);
        Route::get('edit/{id}', ['as' => 'orders.edit', 'uses' => 'Admin\OrdersController@edit']);
        Route::put('update/{id}', ['as' => 'orders.update', 'uses' => 'Admin\OrdersController@update']);
    });
});
Route::group(['prefix' => 'rbac', 'middleware' => ['auth','authorize']], function () {
    Route::get('',['as' => 'rbac.index', 'uses' => 'RbacControllers\IndexController@index']);
    Route::resource('roles', 'RbacControllers\RolesController');
    Route::resource('permissions', 'RbacControllers\PermissionsController');
    Route::get('users', ['as' => 'rbac.users.index', 'uses' => 'RbacControllers\UsersController@index']);
    Route::get('users/{users}/edit', ['as' => 'rbac.users.edit', 'uses' => 'RbacControllers\UsersController@edit']);
    Route::put('users{users}', ['as' => 'rbac.users.update', 'uses' => 'RbacControllers\UsersController@update']);
    Route::get('role_permission', ['as' => 'rbac.role_permission.index', 'uses' => 'RbacControllers\RolesPermissionsController@index']);
    Route::post('role_permission',['as' => 'rbac.role_permission.store', 'uses' => 'RbacControllers\RolesPermissionsController@store']);
});

