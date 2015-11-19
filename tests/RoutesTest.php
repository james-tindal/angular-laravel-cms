<?php

use HLS\Article;
use HLS\Category;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutesTest extends TestCase
{
    protected $twoArticles;

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate:refresh');

        $this->twoArticles = factory(Article::class, 2)->create();
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
        $this->visit('/')
            ->see($this->twoArticles[0]->title)
            ->see($this->twoArticles[0]->published_at)
            ->see($this->twoArticles[1]->title);
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
        $this->visit('/news')
            ->see('<h1>Latest News</h1>')
            ->see($this->twoArticles[0]->title)
            ->see($this->twoArticles[0]->published_at)
            ->see($this->twoArticles[1]->title);
    }

    /** @test */
    public function get_single_article_view()
    {
        $url = '/news/' . $this->twoArticles[0]->slug;

        $this->visit($url)
            ->see($this->twoArticles[0]->title)
            ->see($this->twoArticles[0]->extended)
            ->see($this->twoArticles[0]->published_at);
    }

    /** @test */
    public function get_category_view()
    {
        $category = factory(Category::class)->create();

        $url = '/category/' . $category->name; // Should be slug

        $this->visit($url)
            ->see($category->name);
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
