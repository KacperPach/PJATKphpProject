<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post/{id}', [BlogPostController::class, 'getSinglePost'])->name('singlePost');
    Route::get('/', [BlogPostController::class,'getPost'])->name('allPosts');
    Route::post('post/{id}/comment/save', [CommentController::class, 'saveComm'])->name('saveComm');

});
Route::middleware(['isAdmin','auth'])->group(function () {

    Route::get('admin/post/{id}/edit', [AdminController::class,'getPostEditor']);
    Route::put('admin/post/{id}/edit', [AdminController::class,'updatePost'])->name('admin.updatePost');

    Route::get('admin/createBlogPost', function () {
        return view('admin/createBlogPost');
    })->name('admin.createBlogPost');
    Route::post('admin/savePost', [AdminController::class, 'savePost'])->name('admin.savePost');

    Route::delete('admin/post/{id}/delete', [AdminController::class, 'deletePost'])->name('admin.deletePost');
});


require __DIR__.'/auth.php';
