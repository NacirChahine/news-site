<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Article;
use App\Models\User;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $articles = Article::all();
        $users = User::all();

        foreach ($articles as $article) {
            foreach ($users as $user) {
                Comment::create([
                    'article_id' => $article->id,
                    'user_id' => $user->id,
                    'content' => 'This is a sample comment by ' . $user->username,
                ]);
            }
        }

        // Create additional comments
        Comment::factory(50)->create();
    }
}
