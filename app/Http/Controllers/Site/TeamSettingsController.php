<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Policies\TeamPolicy;
use App\Traits\UserHasTeams;

use App\Team;
use App\User;

class TeamSettingsController extends Controller
{
	use UserHasTeams;


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return $this->renderView('teams.index', ['teams' => auth()->user()->teams]);
	}

	public function create()
	{
		return $this->renderView('teams.create');
	}

	public function store(Request $request)
	{
		
	}

}
