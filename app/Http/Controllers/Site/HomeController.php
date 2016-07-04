<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\MainController;

class HomeController extends MainController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MainController::renderView('home');
    }
}
