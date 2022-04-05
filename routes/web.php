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

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::group(['prefix' => 'state'], function () {
        Route::get('/', 'States\StateController@index')->name('state');
        Route::get('/add', 'States\StateController@add')->name('state.add');
        Route::get('/edit', 'States\StateController@edit')->name('state.edit');
        Route::get('/delete', 'States\StateController@delete')->name('state.delete');
    });

    Route::group(['prefix' => 'city'], function () {
        Route::get('/', 'City\CityController@index')->name('city');
        Route::get('/add', 'City\CityController@add')->name('city.add');
        Route::get('/edit', 'City\CityController@edit')->name('city.edit');
        Route::get('/delete', 'City\CityController@delete')->name('city.delete');
        Route::get('/details', 'City/CityController@getDetails')->name('city.get.details');
    });

    Route::group(['prefix' => 'country'], function () {
        Route::get('/', 'Country\CountryController@index')->name('country');
        Route::get('/add', 'Country\CountryController@add')->name('country.add');
        Route::get('/edit', 'Country\CountryController@edit')->name('country.edit');
        Route::get('/delete', 'Country\CountryController@delete')->name('country.delete');
    });

    Route::group(['prefix' => 'district'], function () {
        Route::get('/', 'Districts\DistrictController@index')->name('district');
        Route::get('/add', 'Districts\DistrictController@add')->name('district.add');
        Route::get('/edit', 'Districts\DistrictController@edit')->name('district.edit');
        Route::get('/delete', 'Districts\DistrictController@delete')->name('district.delete');
        Route::get('/send-notification', 'Districts\DistrictController@send_admission_notification')->name('district.send-notification');
    });

    Route::group(['prefix' => 'student'], function () {
        Route::get('/', 'Student\StudentController@index')->name('student');
        Route::get('/add', 'Student\StudentController@add')->name('student.add');
        Route::get('/edit', 'Student\StudentController@edit')->name('student.edit');
        Route::get('/delete', 'Student\StudentController@delete')->name('student.delete');
    });

    Route::group(['prefix' => 'school'], function () {
        Route::get('/', 'School\SchoolController@index')->name('school');
        Route::get('/add', 'School\SchoolController@add')->name('school.add');
        Route::get('/edit', 'School\SchoolController@edit')->name('school.edit');
        Route::get('/delete', 'School\SchoolController@delete')->name('school.delete');
    });


    Route::get('/test', 'Districts\DistrictController@template');

});
