<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Article::create([
                'title' => 'Sample Article by ' . $user->username,
                'content' => 'This is a sample article content.',
                'image' => 'https://via.placeholder.com/600x400',
                'author_id' => $user->id,
            ]);
        }

        // Create additional articles
        Article::factory(20)->create();
    }
}
