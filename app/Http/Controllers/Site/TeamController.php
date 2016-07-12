<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Team;

class TeamController extends Controller
{
    
	public function index()
	{
		return $this->renderView('teams');
	}

	public function show($id)
	{
		$team = Team::find($id);
		return view('site.team-view', ['team' => $team]);
	}

}
