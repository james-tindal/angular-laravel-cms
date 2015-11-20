<?php

use Carbon\Carbon;
use HLS\Article;

class ArticleTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    function related_returns_related_articles()
    {
        Artisan::call('migrate:refresh');


    }

    /** @test */
    function published_at_is_a_Carbon_instance()
    {
        $article = factory(Article::class)->make([
            'published_at' => '01-11-2015'
        ]);
        $this->assertEquals(Carbon::parse('01-11-2015'), $article->published_at);
    }

    /** @test */
    function scopePublished_filters_unpublished_articles()
    {
        Artisan::call('migrate:refresh');

        $dates = [
            'past' => Carbon::now(),
            'future' => Carbon::now()->addMonth(),
        ];

        $published = $this->persistThreeArticles($dates);

        $this->assertCount(1, $published,                                'Failed to get 1 article');
        $this->assertEquals(0, $published[0]->archived,                  'Article should not be archived');
        $this->assertEquals($dates['past'], $published[0]->published_at, 'Article should be published today');

    }


    private function persistThreeArticles($dates)
    {
        factory(Article::class)->create([
            'published_at' => $dates['past']
        ]);

        factory(Article::class)->create([
            'published_at' => $dates['past'],
            'archived' => true
        ]);

        factory(Article::class)->create([
            'published_at' => $dates['future']
        ]);

        return Article::latest('published_at')->published()->get();
    }
}
