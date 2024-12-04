<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::insert([
            [
                'id' => 1,
                'author_id' => 2,
                'title' => "My first Post",
                'content' => "And, now November 9 of 2024. I need to do so much homework from fucked University, but I really want to practice in PHP .
    Why I must do this all stuff :(

    Okej, Im cool, let's do it. Just go",
                'media' => NULL,
                'comments_type' => "published",
                'posted_at' => "2024-11-11 13:29:04",
                'created_at' => "2024-11-11 13:29:04",
                'updated_at' => "2024-11-11 13:29:04",
            ],
            [
                'id' => 2,
                'author_id' => 2,
                'title' => "Test",
                'content' => "let's do it",
                'media' => NULL,
                'comments_type' => "published",
                'posted_at' => "2024-11-11 14:58:48",
                'created_at' => "2024-11-11 14:58:48",
                'updated_at' => "2024-11-11 14:58:48",
            ]
        ]);
    }
}
