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
	// Auth::logout();
    return view('index');
});

Auth::routes();

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {

    Route::get('/', function () {
        return view('adminIndex');
    });

    Route::resource('companies', 'CompaniesController');
    Route::resource('employees', 'EmployeesController');

});
