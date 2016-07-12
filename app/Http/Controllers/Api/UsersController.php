<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{

    public function index()
    {
    	$users = User::all();
    	return response()->json($users->toArray());
    }

    public function show($id)
    {
    	$user = User::find($id);
    	return response()->json($user->toArray());
    }

    public function destroy($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return response(null, 200);
    }

    // Just send an email to the user so they can activate their account
    // and setup their password/etc...

}
