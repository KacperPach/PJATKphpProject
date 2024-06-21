<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;
use App\Http\Controllers\BlogPostController;
use App\Models\Post;

class CommentController extends Controller
{
        public function saveComm(Request $request) {
        $id = $request->route("id");
        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->post_id = $id;
        if(Auth::user()->id != null) {
            $comment->user_id = Auth::user()->id;
        }
        $comment->save();
        return view('user/singlePost', ['post' => Post::find($id)]);
    }
}
