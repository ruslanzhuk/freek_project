<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MainController
{
    public function index() {
        $posts_friends = [];
        $posts_all = [];
        $posts_all = DB::select('SELECT * FROM posts');
        return view('main/index', ['title' => 'Main', 'posts_friends' => $posts_friends, 'posts_all' => $posts_all]);
    }

    public function reals()
    {
        return view('main/reals', ['title' => 'Reals']);
    }


}
