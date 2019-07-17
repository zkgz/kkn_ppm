<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/restaurant', function (Request $request) {
//     return $request->restaurant();
// });

Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    Route::get('restaurant', 'RestaurantController@index')->name('restaurant.index');
});
