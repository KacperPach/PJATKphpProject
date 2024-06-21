<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use \Illuminate\Http\UploadedFile;
use Storage;
use File;
use App\Models\Comment;

class BlogPostController extends Controller
{
    //

    public function getPost() {
        return view('user/welcome', ['listPost' => Post::all()]);
    }

    public function getSinglePost($id) {
        \Log::info(Comment::where('post_id', $id)->get() );
        return view('user/singlePost', ['post' => Post::find($id), 'commList' => Comment::where('post_id', $id)->get()]);
    }

}
