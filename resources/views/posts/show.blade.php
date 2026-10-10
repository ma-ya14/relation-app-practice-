<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f9f9f9; }
        .post-detail { background: white; padding: 20px; border-radius: 8px; border: 1px solid #ddd; }
        .comment { background: #f3f4f6; padding: 8px; border-radius: 4px; margin-top: 8px; }
        .back-link { display: inline-block; margin-bottom: 15px; color: #0369a1; text-decoration: none; }
    </style>
</head>
<body>
    <a href="/posts" class="back-link">⬅️ 投稿一覧に戻る</a>

    <div class="post-detail">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <hr>

        <h3>💬 コメント一覧 ({{ $post->comments->count() }}件)</h3>
        @forelse ($post->comments as $comment)
            <div class="comment">・{{ $comment->body }}</div>
        @empty
            <p>コメントはまだありません。</p>
        @endforelse
    </div>
</body>
</html>