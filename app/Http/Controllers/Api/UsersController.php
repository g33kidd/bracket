<?php

namespace App\Http\Controllers\Api;

use \App\Models\User;

class UsersController extends \App\Http\Controllers\Controller
{

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function index()
    {
    	$users = $this->userModel->all();

    	return response()->json($users->toArray());
    }

    public function show($id)
    {
    	$user = $this->userModel->find($id);

        if (!$user) {
            return $this->recordNotFound();
        }

    	return response()->json($user);
    }

    public function verify()
    {
        
    }

    public function destroy($id)
    {
    	$user = $this->userModel->find($id);

        if (!$user) {
            return $this->recordNotFound();
        }

    	$user->delete();
    	return response(null, 200);
    }

}
