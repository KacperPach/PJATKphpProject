<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use \Illuminate\Http\UploadedFile;
use Storage;
use File;

class BlogPostController extends Controller
{
    //

    public function getPost() {
        return view('user/welcome', ['listPost' => Post::all()]);
    }

    public function getSinglePost($id) {
        return view('user/singlePost', ['post' => Post::find($id)]);
    }

}
