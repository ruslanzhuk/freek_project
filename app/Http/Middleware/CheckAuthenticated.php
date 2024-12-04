<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        return $next($request);
    }
}

/* Мідлвейр через який проходить HTTP-запит, перевіряє чи користувач залогінений,
якщо ні, його перекидує на сторінку логування, з помилкою, що ви повинні бути
залогованим, якщо користувач залогований, запит передається далі до контролера */
