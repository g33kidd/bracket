<?php

use Illuminate\Http\Request;

// Route::resource('games', 'Api\GamesController')->middleware('scope:admin,settings');
// Route::resource('platforms', 'Api\PlatformsController')->middleware('scope:admin,settings');
// Route::resource('users', 'Api\UsersController')->middleware('scope:admin,users');
// Route::resource('tournaments', 'Api\TournamentsController')->middleware('scope:admin,tournaments');
// Route::resource('posts', 'Api\PostsController')->middleware('scope:admin,posts');
// Route::resource('teams', 'Api\TeamsController')->middleware('scope:admin,teams');

Route::resource('games', 'Api\GamesController');
Route::resource('platforms', 'Api\PlatformsController');
Route::resource('users', 'Api\UsersController');
Route::resource('tournaments', 'Api\TournamentsController');
Route::resource('posts', 'Api\PostsController');
Route::resource('teams', 'Api\TeamsController');