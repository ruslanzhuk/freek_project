<?php

/*
 * Контролер для автентифікації користувачів.
 *
 * Цей контролер забезпечує базову функціональність: Відображення форми входу.
 * Обробка запитів на вхід до системи. Завершення сеансу користувача - вихід.
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        $title = "Login";
        return view('auth.login', ['title' => $title]);
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        // Validate the login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful, redirect to the intended page or dashboard
            return redirect()->intended();
        }

        // If unsuccessful, redirect back with an error message
        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('main.index');
    }
}

