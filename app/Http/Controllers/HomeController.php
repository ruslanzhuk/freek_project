<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index() {
        return view('home/index', ['title' => 'Home']);
    }

    public function post() {
        return view('home/post', ['title' => 'Post']);
    }
}
