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

// No authorization required
// Route::get('/players', 'Site\ProfileController@index');
// Route::get('/profile/{username}', 'Site\ProfileController@show');
// Route::get('/teams', 'Site\TeamsController@index');
// Route::get('/teams/{slug}', 'Site\TeamsController@show');
// Route::get('/tournaments', 'Site\TournamentsController@index');
// Route::get('/{page}', 'Site\PageController@show');

Route::group(['namespace' => 'Site'], function() {
	Route::get('/', 'HomeController@index');
	Route::get('/profile/{any}', 'ProfileController@show');
	Route::get('/teams', 'TeamsController@index');
	Route::get('/teams/{slug}', 'TeamsController@show');

	Route::group(['prefix' => 'settings'], function() {
		Route::get('/', 'SettingsController@index');
		Route::get('/teams', 'TeamSettingsController@index');
	});

	Route::get('/{any}', 'PageController@index');
});

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