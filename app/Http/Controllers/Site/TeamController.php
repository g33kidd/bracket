<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Team;

class TeamController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return renderView('teams');
	}

	public function show($id)
	{
		return renderView('team-view', ['team' => Team::find($id)]);
	}

}
