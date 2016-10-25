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
// use SKAgarwal\GoogleApi\PlacesApi;

Route::get('/', 'Auth\AuthController@getRegister');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Landing page routes...
Route::get('/vendor/landing', function()
{
	return view('vendor/landing');
});

// Map page routes...
Route::get('vendor/map', function()
{
	return view('vendor/map');
});

//Password reset routes...
Route::get('vendor/passwordreset', function()
{
	return view('vendor/passwordreset');
});







