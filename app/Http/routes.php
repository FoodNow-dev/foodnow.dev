<?php

use App\Models\Restaurant;


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
use SKAgarwal\GoogleApi\PlacesApi;

Route::get('/', 'Auth\AuthController@getRegister');

Route::get('home', function() {
	return view('restaurants.search');
});

// Map page routes...
Route::get('vendor/map', function()
{
	return view('vendor/map');
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Password reset routes...
Route::get('vendor/passwordreset', function()
{
	return view('vendor/landing');
});


Route::get('vendor/edit', function()
{
	return view('vendor/edit');
});


// Map page routes...
Route::get('vendor/map', function()
{
	$googlePlaces = new PlacesApi('AIzaSyBFAFmUfcWBHdFGHFsmXWXWAI2Bz7Wxp-0');
	// do not hard code type and location
	$response = $googlePlaces->textSearch('Mexican restaurant', ['location' => '29.426791, -98.489602']);
	return view('vendor/map')->with('data', $response);
});


Route::resource('restaurants','RestaurantsController');

Route::resource('users', 'UserController');




