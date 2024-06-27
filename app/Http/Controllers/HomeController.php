<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $featuredArticles = Article::query()->orderBy('created_at', 'desc')->take(5)->get();
        $articles = Article::query()->orderBy('created_at', 'desc')->skip(5)->take(10)->get();

        return view('home', compact('featuredArticles', 'articles'));
    }
}
