<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutesTest extends TestCase
{
    /** @test */
    public function it_gets_index_view()
    {
        $this->visit('/')
            ->see('<h1>Supporting Solicitors Across Hertfordshire</h1>');
    }

    /** @test */
//    public function index_shows_two_latest_articles()
//    {
//        $this->visit('/')
//            ->see('<h1>Supporting Solicitors Across Hertfordshire</h1>');
//    }

    /** @test */
    public function it_gets_about_us_view()
    {
        $this->visit('/about-us')
            ->see('<h1>The professional society of local solicitors</h1>');
    }

    /** @test */
    public function it_gets_news_view()
    {
        $this->visit('/news')
            ->see('<h1>Latest News</h1>');

        // Test Articles show from database.
    }

    /** @test */
    public function it_gets_events_view()
    {
        $this->visit('/events-and-training')
            ->see('<h1>Events <span class="amp">&amp;</span> Training</h1>');
    }

    /** @test */
    public function it_gets_member_form()
    {
        $this->visit('/become-a-member')
            ->see('<h1>CPD training, support, news, <span class="amp">&</span> social events</h1>');
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
