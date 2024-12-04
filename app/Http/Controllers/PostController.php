<?php

/*Контролер для управління постами користувачів
Він забезпечує функціоналом до створення постів, оновлення постів ,
    видалення постів та повертання постів: усіх, по айді, за якимось сортуванням.


    Зараз реалізований метод тільки до створення поста*/

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController
{
    public function show($id) {
        $post = Post::all()->findOrFail($id);

        return view('post/index', ['post' => $post, 'title' => 'Post: ' . $post->title]);
    }
    public function createPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'comments_type' => 'nullable|string',
            'posted_at' => 'nullable|date',
            'media' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $media = NULL;
        if ($request->hasFile('media')) {
            $mediaPaths = [];
            foreach ($request->file('media') as $file) {
                $path = $file->store('uploads', 'public'); // adjust the path as needed
                array_push($mediaPaths, $path);
            }
            $media = json_encode($mediaPaths);
            $request->merge(['media' => $media]);
        }
        //return redirect()->route('main.index', ['title' => 'Main', 'posts_friends' => [], 'posts_all' => [], 'var1' => [$request->all(), $media]]);


        $post = Post::create([
            'author_id' => $request->user()->id,
            'title' => $request->title,
            'content' => $request->description,
            'comments_type' => $request->comments_type,
            'posted_at' => now(),
            'media' => $media
        ]);

        return redirect()->route('post.show', ['id' => $post->id])->with('success', 'Post created successfully!');
    }
}
