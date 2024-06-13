<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogPostController extends Controller
{
    //
    public function savePost(Request $request) {

        $newPost = new Post;
        $newPost->title = $request->title;
        $newPost->body = $request->body;
        $newPost->path_to_image = $request->file;
        $newPost->save();

        return view('createBlogPost');

    }

    public function getPost() {
        return view('welcome', ['listPost' => Post::all()]);
    }
}
