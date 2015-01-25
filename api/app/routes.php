<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/products', 'ProductsController@getProducts');

Route::get('/product/{id}', 'ProductController@getProduct');

Route::get('/categories', 'CategoriesController@getCategories');

Route::get('/attributes/{name}', 'AttributesController@getOptions');

Route::get('/cart', 'CartController@getItems');
Route::get('/cart/add/{id}/{quantity}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@removeItem');

Route::get('/currencies', 'CurrenciesController@getCurrencies');

Route::get('/customer', 'CustomerController@getAccount');
Route::post('/customer/login', 'CustomerController@login');
Route::get('/customer/logout', 'CustomerController@logout');
Route::post('/customer/register', 'CustomerController@register');