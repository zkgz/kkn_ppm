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

Route::get('/restaurant', 'RestaurantController@index');
Route::get('/restaurant/add', 'RestaurantController@add');
Route::get('/restaurant/edit/{id}', 'RestaurantController@edit');
Route::get('/restaurant/delete/{id}', 'RestaurantController@delete');

Route::post('/restaurant/store', 'RestaurantController@store');
Route::put('/restaurant/update/{id}', 'RestaurantController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/restaurant/{id}', 'RestaurantController@show');
