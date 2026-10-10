<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];
    // 💬 1対多：1つの投稿は複数のコメントを持つ
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //🏷️ 多対多：1つの投稿は複数のタグを持つ（中間テーブル経由）
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
   
}
