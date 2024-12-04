<?php

/*Контролер для управління аватарами користувачів
Він забезпечує функціоналом до оновлення аватара ,
    1. додання нового аватара
    2. повернути аватар який колись був у користувача:
        тобто шукає в історіїї аватари, які користувач уживав в минулому*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Завантажуємо новий аватар
        $file = $request->file('avatar');
        $path = $file->store('avatars', 'public');

        // Знімаємо позначку "is_current" з поточного аватара
        $user->avatars()->update(['is_current' => false]);

        // Додаємо новий аватар
        $user->avatars()->create([
            'path' => $path,
            'is_current' => true,
        ]);

        return back()->with('success', 'Avatar updated successfully.');
    }

    public function revertAvatar($avatarId)
    {
        $user = auth()->user();

        // Знайти аватар по ID
        $avatar = $user->avatars()->findOrFail($avatarId);

        // Переконатися, що цей аватар належить користувачеві
        if ($avatar) {
            // Зняти поточний "is_current"
            $user->avatars()->update(['is_current' => false]);

            // Позначити вибраний аватар як поточний
            $avatar->update(['is_current' => true]);

            return back()->with('success', 'Avatar reverted successfully.');
        }

        return back()->with('error', 'Avatar not found.');
    }

}
