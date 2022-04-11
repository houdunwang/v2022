<?php

namespace Tests\Feature\Account;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * 退出登录
     * @test
     */
    public function userLogout()
    {
        $this->signIn();
        $response = $this->getJson('/api/logout')->assertOk();

        $response->assertJson(['message' => true]);
    }
}
