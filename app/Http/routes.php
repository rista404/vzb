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

// Admin routes
Route::group(['prefix' => 'admin'], function() {
    //Login
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');

    //Default admin
    Route::get('/', 'AdminController@index');

    //Schools
    Route::get('schools', 'AdminController@getSchools');
    Route::get('school/{id}', 'AdminController@getSchool');
    Route::post('school/{id}', 'AdminController@editSchool');
    Route::get('delete/photo/{id}', 'AdminController@deletePhoto');

    //Dorms
    Route::get('dorms', 'AdminController@getDorms');
    Route::get('dorm/add', 'AdminController@addDorm');
    Route::post('dorm/add', 'AdminController@saveDorm');
    Route::get('dorm/{id}', 'AdminController@getDorm');
    Route::post('dorm/{id}', 'AdminController@editDorm');
    Route::get('dorm/delete/{id}', 'AdminController@deleteDorm');

    //Organizations
    Route::get('organizations', 'AdminController@getOrganizations');
    Route::get('organization/add', 'AdminController@addOrganization');
    Route::post('organization/add', 'AdminController@saveOrganization');
    Route::get('organization/{id}', 'AdminController@getOrganization');
    Route::post('organization/{id}', 'AdminController@editOrganization');
    Route::get('organization/delete/{id}', 'AdminController@deleteOrganization');

    //Events
    Route::get('events', 'AdminController@getEvents');
    Route::get('event/add', 'AdminController@addEvent');
    Route::post('event/add', 'AdminController@saveEvent');
    Route::get('event/{id}', 'AdminController@getEvent');
    Route::post('event/{id}', 'AdminController@editEvent');
    Route::get('event/delete/{id}', 'AdminController@deleteEvent');
});

//API v1 routes
Route::group(['prefix' => 'api/v1', 'middleware' => 'cors'], function() {

    //Schools
    Route::any('schools', 'ApiController@getSchools');
    Route::any('schools/{id}', 'ApiController@getSchool')
        ->where('id', '[0-9]+');
    Route::any('schools/type/{type}', 'ApiController@getSchoolByType');
    Route::any('schools/espb/{espb}', 'ApiController@getSchoolByEspb');

    //Dorms
    Route::any('dorms', 'ApiController@getDorms');
    Route::any('dorms/{id}', 'ApiController@getDorm');

    //Organizations
    Route::any('organizations', 'ApiController@getOrganizations');
    Route::any('organizations/{id}', 'ApiController@getOrganization');

    //Events
    Route::any('events', 'ApiController@getEvents');
    Route::any('events/{id}', 'ApiController@getEvent');
});

