<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{

    public function index()
    {
    	$users = User::all();
    	return response()->json(['users' => $users]);
    }

}
