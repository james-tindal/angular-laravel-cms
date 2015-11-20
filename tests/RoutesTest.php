<?php

use HLS\Article;
use HLS\Category;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutesTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate:refresh');
    }

    /** @test */
    public function get_index_view()
    {
        $this->visit('/')
            ->see('<h1>Supporting Solicitors Across Hertfordshire</h1>');
    }

    /** @test */
    public function index_shows_two_latest_articles()
    {
        $twoArticles = factory(Article::class, 2)->create();

        $this->visit('/')
            ->see($twoArticles[0]->title)
            ->see($twoArticles[0]->published_at->format('d-m-Y'))
            ->see($twoArticles[1]->title);
    }

    /** @test */
    public function get_about_us_view()
    {
        $this->visit('/about-us')
            ->see('<h1>The professional society of local solicitors</h1>');
    }

    /** @test */
    public function get_news_view()
    {
        $twoArticles = factory(Article::class, 2)->create();

        $this->visit('/news')
            ->see('<h1>Latest News</h1>')
            ->see($twoArticles[0]->title)
            ->see($twoArticles[0]->published_at->format('d-m-Y'))
            ->see($twoArticles[1]->title);
    }

    // This test is a bit irrelevant. Test differently
    /** @test */
    public function get_single_article_view()
    {
        $article = factory(Article::class)->create();

        $url = '/news/' . $article->slug;

        $this->visit($url)
            ->see($article->title)
            ->see($article->extended)
            ->see($article->published_at->format('d-m-Y'));
    }

    /** @test */
    public function get_category_view()
    {
        // Given a category is associated with a single article
        $category = factory(Category::class)->create();
        $article =  factory(Article::class)->create();
        $article->categories()->attach($category);

        // When the user visits the category route
        $url = '/category/' . $category->slug;
        $this->visit($url)
        // They should see the category's name
            ->see($category->name)
        // They should see the associated article
            ->see($article->title);


    }

    /** @test */
    public function get_events_index()
    {
        $this->visit('/events-and-training')
            ->see('Events <span class="amp">&amp;</span> Training');
    }

    /** @test */
    public function get_training_view()
    {
        $this->visit('/training')
            ->see('Events <span class="amp">&amp;</span> Training');
    }

    /** @test */
    public function get_upcoming_events()
    {
        $this->visit('/events')
            ->see('Events <span class="amp">&amp;</span> Training');
    }

    /** @test */
    public function get_past_events()
    {
        $this->visit('/past-events')
            ->see('Events <span class="amp">&amp;</span> Training');
    }

    /** @test */
    public function it_gets_member_form()
    {
        $this->visit('/become-a-member')
            ->see('CPD training, support, news, <span class="amp">&</span> social events');
    }

    /** @test */
    public function it_gets_contact_form()
    {
        $this->visit('/contact-us')
            ->see('<h1>Contact Us</h1>');
    }

    /** @test */
    public function it_gets_log_in_screen_on_member_route()
    {
        $this->visit('/member-area')
            ->see('<h4>Log in</h4>');

        // Test Logged in route
    }
}
