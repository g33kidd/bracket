<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct(Post $postModel)
    {
        $this->postModel = $postModel;
    }

    public function index()
    {
        $posts = $this->postModel->with('user')->get();

        return response()->json($posts->toArray());
    }

    public function show($id)
    {
        $post = $this->postModel->with('user')->find($id);

        if (!$post) {
            return $this->recordNotFound();
        }

        return response()->json($post);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:posts',
            'slug' => 'required|max:100',
            'content' => 'required',
            'status' => 'required|in:published,draft',
            'excerpt' => 'required'
        ]);

        $post = new $this->postModel([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'excerpt' => $request->input('excerpt')
        ]);
        $request->user()->posts()->save($post);

        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:posts',
            'slug' => 'required|max:100',
            'content' => 'required',
            'status' => 'required|in:published,draft',
            'excerpt' => 'required'
        ]);

        $post = $this->postModel->find($id);

        if (!$post) {
            return $this->recordNotFound();
        }

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');
        $post->status = $request->input('status');
        $post->excerpt = $request->input('excerpt');
        $post->save();

        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = $this->postModel->find($id);

        if (!$post) {
            return $this->recordNotFound();
        }

        $post->delete();

        return response(null, 200);
    }

}
