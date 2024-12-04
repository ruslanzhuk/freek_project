<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, "index"])->name('main.index');
Route::get('/reals', [MainController::class, "index"])->name('main.reals');
Route::get('/home', [HomeController::class, "index"])->name('home.index');

Route::get('/post', [HomeController::class, "post"])->name('home.post');
Route::post('/post', [PostController::class, "createPost"]);
Route::get('/posts/{id}', [PostController::class, "show"])->name('post.show');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
