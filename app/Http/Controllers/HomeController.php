<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $featuredArticles = Article::query()->orderBy('created_at', 'desc')->take(5)->get();
        $articles = Article::query()->orderBy('created_at', 'desc')->skip(5)->take(10)->get();

        return view('home', compact('featuredArticles', 'articles'));
    }
}
