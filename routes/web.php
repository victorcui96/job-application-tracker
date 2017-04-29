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
	return view('app');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/create-application', function () {
    return view('create-application');
});
// Collection REST Routes for Applications
Route::get('/applications', 'ApplicationController@index');
Route::post('/applications', 'ApplicationController@create');

// Singular REST Routes for Applications
// The placeholder name, i.e. 'app', has to match the corresponding parameter name in 'Application Controller'
Route::get('/applications/{app}', 'ApplicationController@show');
Route::put('/applications/{app}', 'ApplicationController@update');
Route::delete('/applications/{app}', 'ApplicationController@destroy');

// Singular REST Routes for Users
Route::post('/register', 'UserController@store');

