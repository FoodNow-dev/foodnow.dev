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

// Random page button
Route::get('restaurants/random', 'RestaurantsController@random');

Route::get('restaurants/restaurant', 'UserController@selectFriends');

Route::post('restaurants/restaurant', 'UserController@sendText');


Route::get('/', 'Auth\AuthController@getRegister');

Route::get('home', function() {
	return view('restaurants.search');
});

// Map page routes...
Route::get('vendor/map', function()
{
	return view('vendor/map');
});

Route::get('restaurants/show', 'RestaurantsController@showData' );


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
	return view('vendor/map');
});


Route::resource('restaurants', 'RestaurantsController');

Route::resource('users', 'UserController');

// Make friends...
Route::post('users/setfriend/{status}', 'UserController@setFriend');


