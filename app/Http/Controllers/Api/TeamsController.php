<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

    public function __construct(Team $teamModel)
    {
        $this->teamModel = $teamModel;
    }

    public function index()
    {
        $teams = $this->teamModel->all();
        return response()->json($teams->toArray());
    }

    public function show($id)
    {
        $team = $this->teamModel->find($id);

        if (!$team) {
            return $this->recordNotFound();
        }

        return response()->json($team);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required'
        ]);

        $team = new $this->teamModel([
            'name' => $request->input('name'),
            'slug' => str_slug($request->input('name')),
            'description' => $request->input('description'),
            'team_information' => 'Some default value... rip',
            'owner_id' => $request->user()->id
        ]);
        $team->save();

        return response()->json($team);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required'
        ]);

        $team = $this->teamModel->find($id);

        if (!$team) {
            return $this->recordNotFound();
        }

        $team->name = $request->input('name');
        $team->slug = str_slug($request->input('name'));
        $team->description = $request->input('description');

        $team->save();

        return response()->json($team);
    }

    public function destroy($id)
    {
        $team = $this->teamModel->find($id);

        if (!$team) {
            return $this->recordNotFound();
        }

        $team->delete();

        return response(null, 200);
    }

}
