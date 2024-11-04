<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;

Route::middleware(['check.auth'])->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
//    Route::post('/reactions', [ReactionController::class, 'store'])->name('reactions.store');
});
