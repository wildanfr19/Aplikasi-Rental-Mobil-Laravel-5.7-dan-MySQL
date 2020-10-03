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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('mobil', 'DataMobilController');



Route::resource('merk', 'DataMerkController');
Route::resource('pemesan', 'DataPemesanController');
Route::resource('jenbay', 'JenBayController');
Route::resource('perjalanan', 'DataPerjalananController');
Route::resource('pesanan', 'DataPesananController');
Route::get('merk/dashboard', 'DataMerkController@dashboard')->name('merk.dashboard');
