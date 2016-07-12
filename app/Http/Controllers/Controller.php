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

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function renderView($view = 'home')
    {
        $page_data = [
            'games' => Game::all(),
            'platforms' => Platform::all(),
            'users' => User::all(),
            'user_count' => User::all()->count()
        ];

        return view('site.' . $view, $page_data);
    }
}
