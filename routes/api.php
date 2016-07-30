<?php

use Illuminate\Http\Request;

Route::resource('games', 'Api\GamesController');
Route::resource('platforms', 'Api\PlatformsController');
Route::resource('users', 'Api\UsersController');
Route::resource('tournaments', 'Api\TournamentsController');
Route::resource('posts', 'Api\PostsController');