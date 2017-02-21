<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::get('/home', 'HomeController@index');

Route::get('/steps', 'HomeController@step');

Route::get('/api/v1/employees/{id?}', 'Employees@index');
Route::post('/api/v1/employees', 'Employees@store');
Route::post('/api/v1/employees/{id}', 'Employees@update');
Route::delete('/api/v1/employees/{id}', 'Employees@destroy');

Route::get('/api/v1/projects/{id?}', 'ProjectController@index');
Route::post('/api/v1/projects', 'ProjectController@store');
Route::post('/api/v1/projects/{id}', 'ProjectController@update');
Route::delete('/api/v1/projects/{id}', 'ProjectController@destroy');

Route::get('/api/v1/steps/{id?}', 'StepController@index');
Route::post('/api/v1/steps', 'StepController@store');
Route::post('/api/v1/steps/{id}', 'StepController@update');
Route::delete('/api/v1/steps/{id}', 'StepController@destroy');