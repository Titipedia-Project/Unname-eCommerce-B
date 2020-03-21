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
Route::get('/home', function () {
    return view('pages/home');
});

Auth::routes();

Route::get('/profile', 'HomeController@index')->name('pages/home');

//Produk
Route::get('/produk', 'ProductsController@index');
Route::get('/produk/create', 'ProductsController@create');
Route::get('/produk/{product}', 'ProductsController@show'); // harus dibawwah, krn kalau diatas akan dibaca menampilkan produk yg idnya create
Route::post('/produk', 'ProductsController@store');
