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

Route::get('/',[
    'uses'=>'FrontEndController@index',
    'as'=>'index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware'=>'auth'],function(){

Route::get('/product',[
    'uses'=>'ProductsController@index',
    'as'=>'product'
]);
Route::get('/product/create',[
    'uses'=>'ProductsController@create',
    'as'=>'product.create'
]);
Route::post('/product/store',[
    'uses'=>'ProductsController@store',
    'as'=>'product.store'
]);
Route::get('/product/edit/{product}',[
    'uses'=>'ProductsController@edit',
    'as'=>'product.edit'
]);
Route::post('/product/update/{product}',[
    'uses'=>'ProductsController@update',
    'as'=>'product.update'
]);
Route::get('/product/delete/{product}',[
    'uses'=>'ProductsController@destroy',
    'as'=>'product.delete'
]);
// Route::resource('product','ProductsController');


});
Route::get('/product/{product}',[
    'uses'=>'FrontEndController@single',
    'as'=>'product.single'
]);
Route::post('/cart/add',[
    'uses'=>'ShoppingController@add_to_cart',
    'as'=>'cart.add'
]);
Route::get('/cart',[
    'uses'=>'ShoppingController@cart',
    'as'=>'cart'
]);
Route::get('cart/incr/{id}/{qty}',[
    'uses'=>'ShoppingController@incr',
    'as'=>'cart.incr'
]);

Route::get('cart/decr/{id}/{qty}',[
    'uses'=>'ShoppingController@decr',
    'as'=>'cart.decr'
]);
Route::get('/cart/delete/{id}',[
    'uses'=>'ShoppingController@cart_delete',
    'as'=>'cart.delete'
]);
Route::get('/cart/rapid/add/{id}',[
    'uses'=>'ShoppingController@rapid_add',
    'as'=>'cart.rapid.add'
]);
Route::get('/cart/checkout',[
    'uses'=>'CheckoutController@index',
    'as'=>'cart.checkout'
]);

Route::post('/cart/checkout',[
    'uses'=>'CheckoutController@pay',
    'as'=>'cart.checkout'
]);

