<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class PlayerController
{
    
	public function index()
	{
		return renderView('players');
	}

	public function show($username)
	{
		$user = User::where('username', '=', $username)->first();
		return renderView('player-view', ['user' => $user]);
	}

}
