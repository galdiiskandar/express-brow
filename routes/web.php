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

    // //Pelanggan
    // Route::resource('pelanggan', 'PelangganController');

    //Front Site Configurator
    Route::resource('pengaturan-konten', 'FrontSiteConfigController');

    //Admin
    Route::resource('admin', 'AdminController');

    //Transaksi
    Route::resource('transaksi', 'TransaksiController');

    //Subscriber List
    Route::get('pelanggan','SubscriberListController@index')->name('subscriber-list.index');
    Route::post('pelanggan/send-email','SubscriberListController@SendEmail')->name('subscriber-list.send');
    Route::get('/pelanggan/delete/{id}','SubscriberListController@delete')->name('subscriber-list.delete');
    Route::get('/pelanggan/edit/{id}','SubscriberListController@edit')->name('subscriber-list.edit');
    Route::put('/pelanggan/update/{id}','SubscriberListController@update')->name('subscriber-list.update');

    //promo
    Route::resource('promo', 'PromoController');

    //chart
    Route::get('chart','ChartController@index')->name('chart.index');

});
