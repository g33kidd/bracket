<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Game;
use App\Models\User;
use App\Models\Platform;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
            'user_count' => User::all()->count()
        ];

        // TODO: figure out how to extract needed values? if this is wanted I suppose
        // renderView('members', ['members', 'teams', 'tournaments']);
        // renderView('members', 'view', ['members', 'teams', 'tournaments']);

        $final_page_data = array_merge($page_data, $data);
        return view('site.' . $view, $final_page_data);
    }
}
