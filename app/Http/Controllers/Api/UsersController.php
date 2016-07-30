<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

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

}
