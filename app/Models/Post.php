<?php

/*
 * Модель що презентує Пости, які публікують користувачі.
 * Вона забезпечує взаємодію з таблицею `posts` у базі даних.*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'content',
        'comments_type',
        'media',
        'posted_at',
    ];

    protected $hidden = ['author_id'];

    protected function casts(): array {
          return [
              //'media' => 'array',
              'posted_at' => 'datetime',
          ];
    }

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function commentsType(): BelongsTo {
        return $this->comments_type;
    }

    protected function getById($id): Post
    {
        $query = DB::query("SELECT * FROM posts WHERE id=? LIMIT 1", $id);

        return $query->first();
    }

    protected function findOrFail($id): Post | null
    {
        $post = $this->getById($id);
        if (!$post) {
            return abort(404);
        }

        return $post;
    }
}
