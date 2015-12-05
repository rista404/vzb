<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

// Authentication routes...
Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('admin/logout', 'Auth\AuthController@getLogout');
Route::get('admin', 'AdminController@index');
Route::get('admin/schools', 'AdminController@getSchools');
Route::get('admin/school/{id}', 'AdminController@getSchool');
Route::post('admin/school/{id}', 'AdminController@editSchool');
Route::get('admin/delete/photo/{id}', 'AdminController@deletePhoto');
Route::get('admin/dorms', 'AdminController@getDorms');
Route::get('admin/dorm/add', 'AdminController@addDorm');
Route::post('admin/dorm/add', 'AdminController@saveDorm');
Route::get('admin/dorm/{id}', 'AdminController@getDorm');
Route::post('admin/dorm/{id}', 'AdminController@editDorm');
Route::get('admin/dorm/delete/{id}', 'AdminController@deleteDorm');


//API v1
Route::group(['prefix' => 'api/v1'], function() {
    Route::any('schools', 'ApiController@getSchools');
    Route::any('schools/{id}', 'ApiController@getSchool');
});

