@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-4">Featured Articles</h1>
                <div class="row">
                    @foreach ($featuredArticles as $article)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    <p class="card-text">{{ Str::limit($article->content, 150) }}</p>
                                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <h1 class="my-4">All Articles</h1>
                <div class="list-group">
                    @foreach ($articles as $article)
                        <a href="{{ route('article.show', $article->id) }}" class="list-group-item list-group-item-action">
                            <h5>{{ $article->title }}</h5>
                            <p>{{ Str::limit($article->content, 150) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
