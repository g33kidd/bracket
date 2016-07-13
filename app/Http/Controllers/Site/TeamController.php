<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Team;

class TeamController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
    
	public function index()
	{
		return $this->renderView('teams');
	}

	public function show($id)
	{
		return $this->renderView('team-view', ['team' => Team::find($id)]);
	}

}
