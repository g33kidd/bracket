<?php

namespace App\Http\Controllers\Site;

use App\Notifications\TournamentStarting;
use Illuminate\Support\Facades\Auth;
use Reflex\Challonge\Challonge;

class HomeController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return renderView('home');
    }

    // THIS IS HOW CHALLONGE WORKS
    public function challonge()
    {
    	$key = config('app.challonge_api');
    	$tournaments = (new Challonge($key))->getTournaments();
    	dd($tournaments);
    }
}
