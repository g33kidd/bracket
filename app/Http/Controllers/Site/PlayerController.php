<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class PlayerController extends Controller
{
    
	public function index()
	{
		return $this->renderView('players');
	}

	public function show($username)
	{
		$user = User::where('username', '=', $username)->first();
		return $this->renderView('player-view', ['user' => $user]);
	}

}
