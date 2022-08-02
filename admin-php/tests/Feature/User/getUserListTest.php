<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getUserListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 获取用户列表
     * @test
     */
    public function getUserList()
    {
        $this->signIn();
        $response = $this->getJson('/api/user');

        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
