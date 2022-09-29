<?php

namespace Tests\Feature\Topic;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetListTest extends TestCase
{
    /**
     * 获取列表
     * @test
     * @return void
     */
    public function getTopicList()
    {
        $response = $this->get('api/topic');

        $response->assertStatus(200)->assertJson(['data' => true]);
    }
}
