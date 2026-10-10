<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // 🛡️ セキュリティ用の許可リスト
    // 「Web画面から一括保存して良い項目」だけをここに書きます（部外者のデータ改ざんを防ぐため）
    protected $fillable = [
        'name',
    ];

    // 🏷️ 多対多のリレーション：1つのタグは複数の投稿（Post）を持つ
    public function posts()
    {
        // 🌉 belongsToMany：中間テーブル（post_tag）を経由して Post モデルと関連付ける命令
        return $this->belongsToMany(Post::class);
    } 
}