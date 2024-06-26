<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::query()->findOrFail($id);
        $relatedArticles = Article::query()->where('id', '!=', $id)->take(5)->get();

        // Increment view count
        $article->increment('views');

        return view('article', compact('article', 'relatedArticles'));
    }

    public function like(Request $request, $id)
    {
        $article = Article::query()->findOrFail($id);
        $article->increment('likes');

        return response()->json(['likes' => $article->likes]);
    }
}
