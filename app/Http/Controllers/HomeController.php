<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
 * Controller for routing
 * Відповідає за те, яку сторінку треба вісвітлити залогованому користувачу
 * сторінку що відповідає саме за дані поточного користувача*/

class HomeController
{
    public function index() {
        if(!Auth::check()) {
            return redirect()->route('auth.login');
        }

        $user = Auth::user();
        $posts_my = DB::select('SELECT * FROM posts WHERE author_id = ?', [Auth::id()]);
        return view('home/index', ['title' => 'Home', 'user' => $user, 'posts_my' => $posts_my]);
    }

    public function post() {
        if(!Auth::check()) {
            return redirect()->route('auth.login');
        }

        $user = Auth::user();
        return view('home/post_create_form', ['title' => 'Post', 'user' => $user]);
    }

    public function settings() {
        if(!Auth::check()) {
            return redirect()->route('auth.login');
        }

        $user = Auth::user();
        return view('home/settings', ['title' => 'Settings', 'user' => $user]);
    }
}
