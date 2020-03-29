<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Auth::routes();

Route::get('/profile', 'HomeController@index')->name('pages/home');

//Produk
Route::get('/produk', 'ProductsController@index');
Route::get('/produk/create', 'ProductsController@create');
Route::get('/produk/{product}', 'ProductsController@show'); // harus dibawwah, krn kalau diatas akan dibaca menampilkan produk yg idnya create
Route::post('/produk', 'ProductsController@store');
Route::delete('/produk/{product}', 'ProductsController@destroy');
Route::get('/produk/{product}/edit', 'ProductsController@edit');
Route::patch('/produk/{product}', 'ProductsController@update');

//request
Route::get('/request', 'ReqController@index');
Route::get('/request/createreq', 'ReqController@create');
Route::post('/request', 'ReqController@store');

//User
Route::post('/topup', 'UserController@update');
Route::get('/Profile/{profile}/edit', 'UserController@edit');

//Order
Route::get('/order/{product}', 'OrderController@showProduk');
Route::post('/order/confirm', 'OrderController@store');
//RajaOngkir
Route::post('/order/get_price', 'OrderController@RajaOngkir');
