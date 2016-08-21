<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller {

	public function index() {
		return view('admin.index');
	}

	public function games() {
		return view('admin.games');
	}

	public function platforms() {
		return view('admin.platforms');
	}

	public function teams() {
		return view('admin.teams');
	}

	public function settings() {
		return view('admin.settings');
	}

}