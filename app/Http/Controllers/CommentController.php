<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $article_id)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $comment = Comment::create([
            'article_id' => $article_id,
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        return response()->json($comment);
    }
}
