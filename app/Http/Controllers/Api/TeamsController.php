<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    
	public function index()
	{
		$teams = Team::all();
		return response()->json($teams->toArray());
	}

	public function show($id)
	{
		$team = Team::findOrFail($id);
		return response()->json($team->toArray());
	}
	
	public function store(Request $request)
	{
		$team = new Team;
		$team->name = $request->name;
		$team->slug = str_slug($request->name);
		$team->description = $request->description;
		$team->team_information = "Some default value... rip";
		$team->owner_id = $request->owner_id;
		$team->save();
		return response()->json($team->toArray());
	}

	public function destroy($id)
	{
		$team = Team::find($id);
		$team->destroy();
		return response(null, 200);
	}

}
