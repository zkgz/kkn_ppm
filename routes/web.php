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
    return view('welcome')->with('title', 'KKN PPM Unhas');
});

Route::resource('restaurant', 'RestaurantController');


/**
 * Add Route For PBB
 */

Route::resource('pbb', 'EarthnbuildingController');

 /**
  * End Route PBB
  */
  
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
