<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'body',
    ];
    // 🔗 逆方向：コメントは1つの投稿に属する
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
