<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //📄 投稿一覧画面を表示するメソッド
public function index(Request $request)
    {
        // 1. URLから 'tag' の値を取得（例: ?tag=Laravel の "Laravel"）
        $tagName = $request->query('tag');

        // 2. 基本となるクエリ（リレーションの事前読み込み）を準備
        $query = Post::with(['comments', 'tags']);

        // 3. もし tag パラメータが存在したら、そのタグを持つ投稿だけに絞り込む 🏷️
        if ($tagName) {
            $query->whereHas('tags', function ($q) use ($tagName) {
                $q->where('name', $tagName);
            });
        }
        // 4. データを取得
        $posts = $query->get();

// 5. 取得したデータ（$posts）と絞り込みタグ名（$tagName）をビューに渡して表示 🖼️
        return view('posts.index', compact('posts', 'tagName'));
    }
public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}

