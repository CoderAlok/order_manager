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
        Route::get('/details', 'City\CityController@getDetails')->name('city.get.details');
        Route::get('/checkphp', 'City\CityController@checkPhp')->name('city.get.checkphp');
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

    Route::group(['prefix' => 'employee'], function () {
        Route::get('/', 'Employee\EmployeeController@index')->name('employee.list');
        Route::get('/list', 'Employee\EmployeeController@employeeList')->name('employee.get.list');
        Route::get('/add', 'Employee\EmployeeController@add')->name('employee.add');
        Route::post('/add_data', 'Employee\EmployeeController@add_data')->name('employee.add.create');
    });

    Route::get('/test', 'Districts\DistrictController@template');

    Route::group(['prefix' => 'tester'], function () {
        Route::group(['prefix' => 'user1'], function () {
            Route::get('/', 'Tester\TesterController@userlist')->name('tester.user.list');
        });

        Route::group(['prefix'=>'roles1'], function(){
            Route::get('/', 'Tester\TesterController@roleslist')->name('tester.roles.list');
        });

        Route::group(['prefix'=>'menu1'], function(){
            Route::get('/', 'Tester\TesterController@menulist')->name('tester.menus.list');
        });

        Route::group(['prefix'=>'assigned_menu'], function(){
            Route::get('/', 'Tester\TesterController@assigned_menu_list')->name('tester.assigned_menu.list');
        });

        Route::get('/assign_menu', 'Tester\TesterController@assign_menu')->name('tester.assign_menu');
        Route::post('/assign_menu/user1', 'Tester\TesterController@get__user1')->name('tester.assign_menu.get.user1');
        Route::post('/assign_menu/get_users', 'Tester\TesterController@get___user1')->name('tester.assign_menu.get.users');
        Route::post('/assign_menu/check_role', 'Tester\TesterController@check_role')->name('tester.assign_menu.check.role');

    });


});
