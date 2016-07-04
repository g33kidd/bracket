<?php

namespace App\Http\Controllers;

use Auth;
use App\Game;
use App\Platform;
use App\User;

class MainController extends Controller
{

    /**
     * Renders a view with the public template data accessible to templates.
     * 
     * @return \Illuminate\Http\Response
     */
    public function renderView($view = 'home')
    {
        $page_data = [
            'games' => Game::all(),
            'platforms' => Platform::all(),
            'users' => User::all(),
            'user_count' => User::all()->count(),
            'other' => [
                'data' => "Some test data.",
                'anything' => "Anything can be here."
            ]
        ];

        return view('site.' . $view, $page_data);
    }
}
