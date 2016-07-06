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

Route::auth();

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
	Route::get('/', 'DashboardController@index');
 	Route::get('/{any}', 'DashboardController@index');
});

// Add some auth middleware to this...
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function() {
	Route::resource('games', 'GamesController');
	Route::resource('platforms', 'PlatformsController');
	Route::resource('users', 'UsersController');
	Route::resource('tournaments', 'TournamentsController');
});

// Main site routes, actions and controllers.
Route::group(['namespace' => 'Site'], function() {
	Route::get('/', 'HomeController@index');

	Route::get('/players', 'ProfileController@index');
	Route::get('/player/{any}', 'ProfileController@show');

	Route::get('/teams', 'TeamsController@index');
	Route::get('/teams/{slug}', 'TeamsController@show');

	Route::get('/news', 'PostController@index');
	Route::get('/news/{slug}', 'PostController@show');

	Route::get('/tournaments', 'TournamentsController@index');

	Route::group(['prefix' => 'settings'], function() {
		Route::get('/', 'SettingsController@index');
		Route::get('/teams', 'TeamSettingsController@index');
	});

	Route::get('/{any}', 'PageController@index');
});