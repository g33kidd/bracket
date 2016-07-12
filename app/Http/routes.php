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
 	Route::get('/{any}', 'DashboardController@index')->where('any', '.*');
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

	Route::get('/teams', 'TeamController@index');
	Route::get('/teams/{id}', 'TeamController@show');

	// Route::get('/players', 'ProfileController@index');
	// Route::get('/player/{any}', 'ProfileController@show');

	// Route::get('/news', 'PostController@index');
	// Route::get('/news/{slug}', 'PostController@show');

	// Route::get('/tournaments', 'TournamentsController@index');

});

/**
 * Teamwork routes
 */
Route::group(['prefix' => 'settings/teams', 'namespace' => 'Teamwork'], function()
{
    Route::get('/', 'TeamController@index')->name('teams.index');
    Route::get('create', 'TeamController@create')->name('teams.create');
    Route::post('teams', 'TeamController@store')->name('teams.store');
    Route::get('edit/{id}', 'TeamController@edit')->name('teams.edit');
    Route::put('edit/{id}', 'TeamController@update')->name('teams.update');
    Route::delete('destroy/{id}', 'TeamController@destroy')->name('teams.destroy');
    Route::get('switch/{id}', 'TeamController@switchTeam')->name('teams.switch');

    Route::get('members/{id}', 'TeamMemberController@show')->name('teams.members.show');
    Route::get('members/resend/{invite_id}', 'TeamMemberController@resendInvite')->name('teams.members.resend_invite');
    Route::post('members/{id}', 'TeamMemberController@invite')->name('teams.members.invite');
    Route::delete('members/{id}/{user_id}', 'TeamMemberController@destroy')->name('teams.members.destroy');

    Route::get('accept/{token}', 'AuthController@acceptInvite')->name('teams.accept_invite');
});
