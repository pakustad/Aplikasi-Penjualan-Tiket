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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/excel', 'TransaksiController@excel')->name('laporan.excel');
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::resource('kategori', 'KategoriController');
    Route::get('/upload/kategori/excel', 'KategoriController@excel')->name('kategori.excel');
    Route::resource('tiket', 'TiketController');

    Route::get('transaksi', 'TransaksiController@index')->name('transaksi.index');
    Route::post('transaksi', 'TransaksiController@store')->name('transaksi.store');
    Route::delete('transaksi/{id}', 'TransaksiController@destroy')->name('transaksi.destroy');
    Route::get('transaksi/update', 'TransaksiController@update')->name('transaksi.update');
    Route::get('transaksi/pdf', 'TransaksiController@laporan')->name('transaksi.laporan');
    Route::get("transaksi/create", "TransaksiController@create");
    Route::get("transaksi/new", "TransaksiController@new");
});
