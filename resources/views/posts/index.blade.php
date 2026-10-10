<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧画面</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f9f9f9; }
        .post-card { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; border: 1px solid #ddd; }
        .tag { background: #e0f2fe; color: #0369a1; padding: 3px 8px; border-radius: 4px; font-size: 12px; margin-right: 5px; text-decoration: none; display: inline-block; }
        .tag:hover { background: #bae6fd; }
        .comment { background: #f3f4f6; padding: 8px; border-radius: 4px; margin-top: 5px; font-size: 14px; }
    </style>
</head> 
<body>
    <h1>📄 記事一覧</h1>

    {{-- 🏷️ タグで絞り込み中の場合に表示するメッセージ --}}
    @if (!empty($tagName))
        <p>「<strong>{{ $tagName }}</strong>」タグで絞り込み中 🏷️（<a href="/posts">すべての投稿を表示</a>）</p>
    @endif

    {{-- 投稿データを1件ずつループ処理で表示 🔄 --}}
    @foreach ($posts as $post)
        <div class="post-card">
            {{-- 詳細画面へのリンク 🔗 --}}
            <h2>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>

            <p>{{ $post->content }}</p>

            {{-- 🏷️ タグ一覧の表示（クリックすると絞り込みリンクへ 🔗） --}}
            <div>
                <strong>タグ:</strong>
                @forelse ($post->tags as $tag)
                    <a href="/posts?tag={{ $tag->name }}" class="tag">🏷️ {{ $tag->name }}</a>
                @empty
                    <span>タグなし</span>
                @endforelse
            </div>

            <hr>

            {{-- 💬 コメント一覧の表示（1対多） --}}
            <div>
                <h3>💬 コメント ({{ $post->comments->count() }}件)</h3>
                @forelse ($post->comments as $comment)
                    <div class="comment">・{{ $comment->body }}</div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </div>
        </div>
    @endforeach
</body>
</html>