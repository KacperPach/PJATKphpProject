<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

Route::get('/', [BlogPostController::class,'getPost']);

Route::get('/createBlogPost', function () {
    return view('createBlogPost');
})->name('createBlogPost');

Route::post('/savePost', [BlogPostController::class, 'savePost'])->name('savePost');
