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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Homepage
Route::get('/','WebsiteController@index');

//Subsriber List
Route::post('/subscribeList','WebsiteController@store')->name('subscribelist.store');

Route::group(['prefix' => 'admin'], function () {
    //Barang
    Route::resource('barang', 'BarangController');

    //Proyek
    Route::resource('proyek', 'ProyekController');

    //Pelanggan
    Route::resource('pelanggan', 'PelangganController');

    //Front Site Configurator
    Route::resource('pengaturan-konten', 'FrontSiteConfigController');

    //Admin
    Route::resource('admin', 'AdminController');

    //Transaksi
    Route::resource('transaksi', 'TransaksiController');
});
