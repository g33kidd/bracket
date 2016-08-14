<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Notifications\TournamentStarting;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->renderView('home');
    }

    public function notify()
    {
    	Auth::user()->notify(new TournamentStarting());
    	return response(null, 200);
    }
}
