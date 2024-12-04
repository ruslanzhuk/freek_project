<?php

/*
 * Контролер відповідаючий за коментарі і махінації з ними:
 * на данний момент описана тільки функція додавання коментарів, і ці коментарі можуть додавати користувачі
 * які виконують якісь умови*/

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;


/**
 * Функція додавання коментаря
 * @param Post $post Пост до якого користувач хоче додати коментар
 * @return \Illuminate\Http\RedirectResponse Редирект на попередню сторінку:
 *                                            - з повідомленням про успіх, якщо коментар успішно створено;
 *                                            - з повідомленням про помилку, якщо користувач не має доступу.
 */
class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $user = $request->user();
        $commentsType = $post->comments_type;

        if ($commentsType === 'unpublished' && (!$user || $user->id !== $post->author_id)) {
            return back()->with('error', 'You are not allowed to comment on this post.');
        }

        if ($commentsType === 'only_friends') {
            if (!$user || !$user->isFriendWith($post->author)) { // Метод `isFriendWith` ви реалізуєте у моделі `User`
                return back()->with('error', 'Only friends can comment on this post.');
            }
        }

        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => $user ? $user->id : null,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
}
