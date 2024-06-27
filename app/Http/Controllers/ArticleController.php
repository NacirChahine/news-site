<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::with('comments.user')->findOrFail($id);
        // todo we can make a better logic to get related articles
        $relatedArticles = Article::query()->where('id', '!=', $id)->take(5)->get();

        // Increment view count
        $article->increment('views');

        // Check if user has liked this article
        $userHasLiked = auth()->check() ? $article->likes()->where('user_id', auth()->id())->exists() : false;

        return view('article', compact('article', 'relatedArticles', 'userHasLiked'));
    }

    public function like(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        // Check if user has already liked
        if ($article->likes()->where('user_id', auth()->id())->exists()) {
            return response()->json(['message' => 'You have already liked this article.'], 400);
        }

        $article->likes()->attach(auth()->id());

        return response()->json(['likes' => $article->likes()->count()]);
    }
}
