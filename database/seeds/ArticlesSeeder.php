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
        factory(Article::class, 16)->create()->each(function($article){
            $this->attachThreeCategories($article);
        });
    }

    public function attachThreeCategories($article)
    {
        foreach ($this->threeCategoryIds() as $id) {
            $article->categories()->attach($id);
        }
    }

    private function threeCategoryIds()
    {
        $numbers = range(1, 10);
        shuffle($numbers);
        return array_slice($numbers, 1, 3);
    }
}
