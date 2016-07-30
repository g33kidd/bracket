<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Post;

class PostsController extends Controller
{
    
	public function index()
	{
		$posts = Post::all();
        return response()->json($posts->toArray());
	}

	public function store(Request $request)
	{
		$post = new Post();
		$post->title = $request->title;
		$post->content = $request->content;
		$post->save();

		return response()->json($post->toArray());
	}

}
