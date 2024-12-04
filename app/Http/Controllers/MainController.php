<?php

/*
 * Controller for routing
 * Відповідає за те, яку сторінку треба вісвітлити користувачу
 * сторінку що відповідає за публічні сторінки, на яких можуть бути як залоговані користувачі
 * так і не залоговані. */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController
{
    public function index(Request $request) {
        $posts_friends = [];
        $posts_all = [];
        $posts_all = DB::select('SELECT * FROM posts');
        $var1 = $request->get('var1', null);
        return view('main/index', ['title' => 'Main', 'posts_friends' => $posts_friends, 'posts_all' => $posts_all, 'var1' => $var1]);
    }

    public function reals()
    {
        return view('main/reals', ['title' => 'Reals']);
    }

}
