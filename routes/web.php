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

Route::get('/', 'HomeController@welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/taxpayer/stats', 'TaxpayerController@stats');

Route::get('/taxpayer/import', 'TaxpayerController@import');
Route::get('/taxpayer/importData', 'TaxpayerController@importData');
Route::post('/taxpayer/importData', 'TaxpayerController@importData');

Route::resource('taxpayer', 'TaxpayerController');
  
Auth::routes();

Route::get('/upload', 'TaxpayerController@upload');
Route::post('/upload/proses', 'TaxpayerController@proses_upload');