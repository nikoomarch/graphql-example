<?php

use App\Article;
use App\Comment;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 30)->create()->each(function ($user) {
            factory(Article::class, rand(0, 10))->create(['user_id' => $user->id])->each(function ($article) {
                factory(Comment::class, rand(0, 5))->create([
                    'article_id' => $article->id,
                    'user_id' => User::all()->random()->id
                ]);
            });
        });
    }
}
