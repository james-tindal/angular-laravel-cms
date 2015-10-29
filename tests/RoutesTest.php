<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoutesTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->visit('/')
             ->see('<h1>Supporting Solicitors Across Hertfordshire</h1>');
    }

    public function testAboutUs()
    {
        $this->visit('/about-us')
            ->see('<h1>The professional society of local solicitors</h1>');
    }

    public function testNews()
    {
        $this->visit('/news')
            ->see('<h1>Latest News</h1>');

        // Test Articles show from database.
    }

    public function testEventsAndTraining()
    {
        $this->visit('/events-and-training')
            ->see('<h1>Events <span class="amp">&amp;</span> Training</h1>');
    }

    public function testBecomeAMember()
    {
        $this->visit('/become-a-member')
            ->see('<h1>CPD training, support, news, <span class="amp">&</span> social events</h1>');
    }

    public function testContactUs()
    {
        $this->visit('/contact-us')
            ->see('<h1>Contact Us</h1>');
    }

    public function testMemberArea()
    {
        $this->visit('/member-area')
            ->see('<h4>Log in</h4>');

        // Test Logged in route
    }
}
