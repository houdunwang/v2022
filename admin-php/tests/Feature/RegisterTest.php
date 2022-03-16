<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * 用户注册
     * @test
     */
    public function userRegister()
    {
        $response = $this->post('/api/register', [
            'email' => 'abc',
            'password' => 'admin'
        ]);

        $response->assertStatus(201);
        // $response->assertSee('@iii');
    }
}
