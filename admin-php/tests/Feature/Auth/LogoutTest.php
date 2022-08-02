<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 退出登录
     * @test
     */
    public function logout()
    {
        $this->signIn();
        $response = $this->getJson('/api/logout')->assertOk();

        $response->assertSee(['status' => 'success']);
    }
}
