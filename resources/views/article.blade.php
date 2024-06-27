@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $article->title }}</h1>
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="img-fluid">
                <p>{{ $article->content }}</p>
                <div>
                    <button id="like-button" class="btn btn-primary" @if($userHasLiked) disabled @endif>Like</button>
                    <span id="like-count">{{ $likesCount }}</span> Likes
                </div>
                <div class="mt-3">
                    <p>Views: {{ $article->views }}</p>
                </div>
                <hr>
                <h4>Comments</h4>
                @auth
                    <form id="comment-form" action="{{ route('comment.store', $article->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea id="comment-content" name="comment" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Add Comment</button>
                    </form>
                @else
                    <p>Please <a href="{{ route('login') }}">login</a> to comment.</p>
                @endauth
                <div id="comments-section" class="mt-4">
                    @foreach($article->comments as $comment)
                        <div class="comment">
                            <strong>{{ $comment->user->username }}</strong>
                            <p>{{ $comment->content }}</p>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <span>Share on </span>
                <a href="https://x.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank">X</a>,
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank">Facebook</a>
            </div>
            <div class="col-md-4">
                <h4>Related Articles</h4>
                <ul class="list-group">
                    @foreach($relatedArticles as $relatedArticle)
                        <li class="list-group-item">
                            <a href="{{ route('article.show', $relatedArticle->id) }}">{{ $relatedArticle->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('like-button').addEventListener('click', function() {
            fetch('{{ route('article.like', $article->id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('like-count').textContent = data.likes;
                    document.getElementById('like-button').disabled = true;
                });
        });

        document.getElementById('comment-form').addEventListener('submit', function(event) {
            event.preventDefault();
            let content = document.getElementById('comment-content').value;

            fetch(this.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ content: content })
            })
                .then(response => response.json())
                .then(data => {
                    let commentHtml = `
                        <div class="comment">
                            <strong>{{ auth()->user()?->username }}</strong>
                            <p>${content}</p>
                        </div>
                        <hr>
                    `;
                    document.getElementById('comments-section').insertAdjacentHTML('beforeend', commentHtml);
                    document.getElementById('comment-content').value = '';
                });
        });
    </script>
@endsection
