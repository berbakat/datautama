<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'App\Http\Controllers\Login@login');
Route::get('login', 'App\Http\Controllers\Login@login')->name('login');
Route::post('loginaksi', 'App\Http\Controllers\Login@loginaksi')->name('loginaksi');

Route::get('register', 'App\Http\Controllers\Register@register')->name('register');
Route::post('saveregister', 'App\Http\Controllers\Register@saveregister')->name('saveregister');

Route::get('home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::get('logout', 'App\Http\Controllers\Login@logoutaksi')->name('logout')->middleware('auth');

Route::get('produk', 'App\Http\Controllers\Produk@index')->name('produk')->middleware('auth');
Route::get('get_product', 'App\Http\Controllers\Produk@get_product')->name('get_product')->middleware('auth');
Route::post('saveproduk', 'App\Http\Controllers\Produk@saveproduk')->name('saveproduk')->middleware('auth');
Route::get('get_produkById/{id}', 'App\Http\Controllers\Produk@get_produkById')->name('get_produkById')->middleware('auth');
Route::get('hapus_produk/{id}', 'App\Http\Controllers\Produk@hapus_produk')->name('hapus_produk')->middleware('auth');

Route::get('transaksi', 'App\Http\Controllers\Transaksi@index')->name('transaksi')->middleware('auth');
Route::get('get_transaksi', 'App\Http\Controllers\Transaksi@get_transaksi')->name('get_transaksi')->middleware('auth');



