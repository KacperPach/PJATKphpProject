<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Models\Post;
use File;
use Storage;
use Route;

class AdminController extends BlogPostController
{
        //
        public function getAdminPanel() {
            return view('admin/adminPanel');
        }

        public function savePost(Request $request) {

            $isCorrectExt=false;

            if ($request->file("file"))
                $isCorrectExt = $this->verifyExtention($request->file("file")->getClientOriginalExtension());

            //save obj to db
            $newPost = new Post;
            $newPost->title = $request->title;
            $newPost->body = $request->body;
            if ($isCorrectExt)
                $newPost->file_extention = $request->file("file")->getClientOriginalExtension();
            $newPost->save();

            //save image
            if ($isCorrectExt)
                $this->handleFile($request->file("file"), $newPost->id);

            return view('admin/createBlogPost');

        }
        public function deletePost($id) {
            $post = Post::find($id);

            if ($post)
                $post->comments()->delete();
                $post->delete();
            $this->deleteFile($post->id.'.'.$post->file_extention);

            return parent::getPost();
        }

        public function getPostEditor($id) {
            return view('admin/singlePostEdit', ['post' => Post::find($id)]);
        }

        public function updatePost(Request $request ) {
            $post = Post::find($request->route('id'));
            $isCorrectExt = false;
            if ($request->file("file")) {
                $isCorrectExt = $this->verifyExtention($request->file("file")->getClientOriginalExtension());
            }

            if ($post) {
                $post->title = $request->title;
                $post->body = $request->body;
                if ($isCorrectExt)
                    $post->file_extention = $request->file('file')->getClientOriginalExtension();
                $post->update();

                //save image
                if ($isCorrectExt)
                    $this->handleFile($request->file("file"), $post->id);


                return parent::getSinglePost($post->id);
            }
            return parent::getPost();
        }

        private function deleteFile($filename) {

            // TODO figure out someday why no work
            $DESTINATION = "uploads";
            \Log::info(public_path($DESTINATION.'/'.$filename));
            \Log::info(File::exists(public_path($DESTINATION.'.'.$filename)));
            if(File::exists(public_path($DESTINATION.'.'.$filename)))
                Storage::delete(public_path($DESTINATION.'/'.$filename));
        }

        private function handleFile(UploadedFile $file, $id) {
            $DESTINATION = "uploads";
            $filename = $id .".".$file->getClientOriginalExtension();
            $file->move($DESTINATION,$filename);
        }

        private function verifyExtention(string $ext) {
            $ALLOWED_EXTENSIONS = ['PNG', 'JPG', 'SVG', 'WEBP', 'GIF','png', 'jpg', 'svg', 'webp', 'gif'];
            if (in_array($ext, $ALLOWED_EXTENSIONS))
                return true;
            return false;
        }
}
