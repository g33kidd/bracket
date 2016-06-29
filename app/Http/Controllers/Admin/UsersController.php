<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index()
    {
        return view('admin.users');
    }

}
