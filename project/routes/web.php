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
Route::get('/', 'PagesController@index');
Route::get('product', 'ProductsController@search');
Route::get('productMidland', 'ProductsController@searchMidland');
Route::get('search', 'ProductsController@autocomplete');
Route::get('subjekt', 'ProductsController@subjektet');
Route::get('aksionet', 'ProductsController@aksionProduct');
Route::get('/send/mail', 'HomeController@mail');
Route::get('customSearch', 'ProductsController@customSeachProduct');
Route::post('insertIntoCart', 'ProductsController@addCart');
Route::get('/midland', 'PagesController@midland');
Route::post('addPicture', 'HomeController@addPicture');
Route::get('addMaps', 'HomeController@addMapData');
Route::get('/form', 'PagesController@form');
Route::get('/picture', 'PagesController@pictures');
Route::get('/menaxhimi', 'PagesController@menaxhimi');
Auth::routes(['register' => false]);
Route::get('/home', 'PagesController@index');
Route::post('changeStatus', 'HomeController@changeStatus');
Route::resource('order', 'OrdersController');
Route::resource('user', 'UsersController');
Route::resource('cart', 'CartsController');
Route::resource('aksion', 'AksionetController');
Route::resource('client', 'ClientController');
Route::resource('klasifikimi', 'KlasifikimiController');
