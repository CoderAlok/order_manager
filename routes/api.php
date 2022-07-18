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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'users', 'namespace' => 'Api\v1', 'middleware'=>'cors'], function () {
    Route::get('/', 'UserController@list')->name('user.list');
    Route::post('/add', 'UserController@add')->name('user.add');
    Route::put('/update/{id}', 'UserController@update')->name('user.update');
    Route::delete('/delete/{id}', 'UserController@delete')->name('user.delete');
});
