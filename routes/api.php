<?php
use Illuminate\Http\Request;

/**
 * Base Resource routes
 * So we don't have to specify each one individually.
 */
Route::resource('games', 'Api\GamesController');
Route::resource('platforms', 'Api\PlatformsController');
Route::resource('users', 'Api\UsersController');
Route::resource('tournaments', 'Api\TournamentsController');
Route::resource('posts', 'Api\PostsController');
Route::resource('teams', 'Api\TeamsController');

// Other Routes
Route::group(['prefix' => 'users'], function() {
	Route::get('/me', 'Api\UsersController@verify')->middleware('scope:admin,user');
});

// Route::resource('games', 'Api\GamesController')->middleware('scope:admin,settings');
// Route::resource('platforms', 'Api\PlatformsController')->middleware('scope:admin,settings');
// Route::resource('users', 'Api\UsersController')->middleware('scope:admin,users');
// Route::resource('tournaments', 'Api\TournamentsController')->middleware('scope:admin,tournaments');
// Route::resource('posts', 'Api\PostsController')->middleware('scope:admin,posts');
// Route::resource('teams', 'Api\TeamsController')->middleware('scope:admin,teams');

// Route::group(['prefix' => 'games', 'namespace' => 'Api'], function() {
// 	Route::get('/', 'GamesController@index');
// 	Route::get('/{id}', 'GamesController@show');
// 	Route::post('/', 'GamesController@store')->middleware('scope:admin,regular');
// 	Route::put('/', 'GamesController@update')->middleware('scope:admin,regular');
// 	Route::delete('/', 'GamesController@destroy')->middleware('scope:admin,regular');
// });

// Route::group(['prefix' => 'teams', 'namespace' => 'Api', function() {
// 	Route::get('/', 'TeamsController@index');
// 	Route::''
// }]);