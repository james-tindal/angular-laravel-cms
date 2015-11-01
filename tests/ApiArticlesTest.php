<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiArticlesTest extends TestCase
{
    /** @test */
    public function it_returns_data_on_index()
    {
        $this->json('get', '/api/articles');
    }
}
