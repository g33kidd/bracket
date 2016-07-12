<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Game;
use App\User;
use App\Platform;
use App\Team;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    // public function __construct()
    // {
    // 	$this->middleware('auth');
    // }

    public function renderView($view = 'home', $data = ['extra' => "No Extra Data"])
    {   
        $page_data = [
            'games' => Game::all(),
            'platforms' => Platform::all(),
            'users' => User::all(),
            'teams' => Team::all(),
            'user_count' => User::all()->count()
        ];

        // TODO: figure out how to extract needed values? if this is wanted I suppose
        // renderView('members', ['members', 'teams', 'tournaments']);
        // renderView('members', 'view', ['members', 'teams', 'tournaments']);

        $final_page_data = array_merge($page_data, $data);
        return view('site.' . $view, $final_page_data);
    }
}
