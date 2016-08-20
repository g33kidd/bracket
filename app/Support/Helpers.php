<?php

// Renders a view with default site-data a view might require.
function renderView($view = 'home', $extras = ['extra' => 'No extra data.']) {
	$defaults = [
		'games'	=> App\Models\Game::all(),
		'platforms' => App\Models\Platform::all(),
		'users' => App\Models\User::all(),
		'teams' => App\Models\Team::all(),
	];

	// Filter out data based on what the view accesses?
	// or something similar...

	// TODO: figure out how to extract needed values? if this is wanted I suppose
    // renderView('members', ['members', 'teams', 'tournaments']);
    // renderView('members', 'view', ['members', 'teams', 'tournaments']);

	$page_data = array_merge($defaults, $extras);
	return view('site.' . $view, $page_data);
}

function getViewData($name) {
	// an array of things a view can access
	$accessible = [
		'users', 'games', 'platforms', 'tournaments'
	];

	// get the data based on name?
	// return the data as a collection?
	// do something?
}