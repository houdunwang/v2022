<?php

namespace Tests\Feature\Site;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuerySiteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 站点列表
     * @test
     */
    public function getSiteList()
    {
        $this->signIn();
        $response = $this->getJson('/api/site');

        $response->assertSuccessful()->assertJson(['status' => 'success']);
    }
}
