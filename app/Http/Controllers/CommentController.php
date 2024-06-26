<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $article_id)
    {
        $request->validate([
            'comment' => 'required|string'
        ]);

        Comment::query()->create([
            'article_id' => $article_id,
            'user_id' => auth()->id(),
            'content' => $request->comment,
        ]);

        return back();
    }
}
