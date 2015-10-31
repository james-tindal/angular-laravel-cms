<?php

use HLS\Article;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 10)->create()->each(function($article){
            $this->attachTwoCategories($article);
        });

        factory(Article::class, 6)->create();
    }

    public function attachTwoCategories($article)
    {
        foreach ($this->twoCategoryIds() as $id) {
            $article->categories()->attach($id);
        }
    }

    private function twoCategoryIds()
    {
        $numbers = range(1, 5);
        shuffle($numbers);
        return array_slice($numbers, 1, 2);
    }
}
