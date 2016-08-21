<?php
/**
 * Web Routes
 */

// Authentication routes
Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::get('/', 'AdminController@index');
    Route::get('/teams', 'AdminController@teams');
    Route::get('/games', 'AdminController@games');
    Route::get('/platforms', 'AdminController@platforms');
    Route::get('/settings', 'AdminController@settings');
});

// The main site routes
Route::group(['namespace' => 'Site'], function() {
	Route::get('/', 'HomeController@index');
    Route::get('/challonge', 'HomeController@challonge');

    // Tournaments
    Route::group(['prefix' => 'tournaments'], function() {
        Route::get('/{gameOrPlatformSlug}', 'TournamentController@index');
        Route::get('/{slug}/view', 'TournamentController@show');
    });

    // Users/Players
    Route::group(['prefix' => 'players'], function() {
        Route::get('/', 'PlayerController@index');
        Route::get('/{username}', 'PlayerController@show');
    });

    // Teams
    Route::group(['prefix' => 'teams'], function() {
        Route::get('/', 'TeamController@index');
        Route::get('/{slug}', 'TeamController@show');
        Route::post('/invite', 'TeamInvitesController@store');
        Route::get('/accept/{token}', 'TeamInvitesController@index');
    });
});