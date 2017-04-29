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

// Styleguide Route
Route::get('/styleguide', function () {
	return view('styleguide');
});

// Credits Route
Route::get('/credits', function () {
	return view('credits');
});


// Collection REST Routes for Applications
Route::get('/applications', 'ApplicationController@index');
Route::post('/applications', 'ApplicationController@create');

// Singular REST Routes for Applications
// The placeholder name, i.e. 'app', has to match the corresponding parameter name in 'Application Controller'
Route::get('/applications/{app}', 'ApplicationController@show');
// Update a specific application
Route::put('/applications/{app}', 'ApplicationController@update');
// Delete a specific application
Route::delete('/applications/{app}', 'ApplicationController@destroy');


// Singular REST Routes for Users
// Please ignore this route -> did not have time to implement this
Route::post('/register', 'UserController@store');

// Please ignore this route -> did not have time to implement this
Route::get('/register', function () {
    return view('register');
});

