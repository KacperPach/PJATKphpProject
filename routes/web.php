<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

Route::get('/', [BlogPostController::class,'getPost']);

Route::get('/createBlogPost', function () {
    return view('createBlogPost');
})->name('createBlogPost');

Route::get('/post/{id}', [BlogPostController::class, 'getSinglePost']);

Route::get('/post/{id}/edit', [BlogPostController::class,'getPostEditor']);

Route::put('/post/{id}/edit', [BlogPostController::class,'updatePost'])->name('updatePost');

Route::post('/savePost', [BlogPostController::class, 'savePost'])->name('savePost');

Route::delete('/post/{id}/delete', [BlogPostController::class, 'deletePost'])->name('deletePost');
