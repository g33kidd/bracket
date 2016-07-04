<?php

namespace App\Http\Controllers;

use Auth;
use App\Game;
use App\Platform;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pagevars = [
            'games' => Game::all(),
            'platforms' => Platform::all(),
            'user_count' => User::all()->count(),
        ];


        // Could probably have this in the blade template and
        // 
        if(Auth::check()) {
            return view('site.home-member', $pagevars);            
        }else {
            return view('site.home-guest', $pagevars);
        }
    }
}
