@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $article->title }}</h1>
                <img src="{{ $article->image }}" class="img-fluid" alt="{{ $article->title }}">
                <p>{{ $article->content }}</p>
                <div>
                    <button id="like-button" class="btn btn-primary">Like</button>
                    <span id="like-count">{{ $article->likes }}</span> Likes
                </div>
                <div>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank">Share on Facebook</a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank">Tweet</a>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Related Articles</h4>
                <ul class="list-group">
                    @foreach ($relatedArticles as $related)
                        <li class="list-group-item">
                            <a href="{{ route('article.show', $related->id) }}">{{ $related->title }}</a>
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
                });
        });
    </script>
@endsection
