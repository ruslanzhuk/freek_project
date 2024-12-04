<?php

/*
 * Контролер що відповідає за реєстрацію
 * Має такі методи: висвітлення форми до реєстровання нового користувача,
 * реєстрація нового користувача з валідацією усіх параметрів що передадуться та записання до бази данних -
 * редірект на головну сторінку вже як залогований користувач.*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $title = "Register";
        return view('auth.register', ['title' => $title]);
    }

    /**
     * Реєстрація нового користувача.
     * @param Request $request HTTP-запит, що містить дані форми реєстрації.
     * @return \Illuminate\Http\RedirectResponse Перенаправлення на попередню сторінку у разі помилки або на головну сторінку після успішної реєстрації.
     */

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return redirect()->route('main.index')->with('success', 'Registration successful!');
    }
}

