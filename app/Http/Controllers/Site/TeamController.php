<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Team;

class TeamController
{

	public function index()
	{
		return renderView('teams');
	}

	public function show($id)
	{
		return renderView('team-view', ['team' => Team::find($id)]);
	}

}
