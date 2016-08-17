<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{

	public function index($game) {
		$tournaments = Tournament::all();
		return renderView('tournaments');
	}

	public function show() {
		
	}

}
