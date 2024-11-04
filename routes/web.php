<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, "index"])->name('main.index');
Route::get('/reals', [MainController::class, "index"])->name('main.reals');
Route::get('/settings', [MainController::class, "index"])->name('main.settings');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
