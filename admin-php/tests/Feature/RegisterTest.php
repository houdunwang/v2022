<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    protected $data = [
        'email' => '2300071698@qq.com',
        'password' => 'admin'
    ];

    /**
     * 用户注册
     * @test
     */
    public function userRegister()
    {
        $response = $this->post('/api/register', $this->data);
        $response->assertStatus(201);
    }

    /**
     * 非法邮箱验证
     * @test
     */
    public function registerEmailValidate()
    {
        $response = $this->post('/api/register', ['email' => 'hd'] + $this->data);
        $response->assertSessionHasErrors('email');
    }

    /**
     * @test
     */
    public function EmailRequiredValidate()
    {
        $data = $this->data;
        unset($data['email']);
        $response = $this->post('/api/register', $data);
        $response->assertSessionHasErrors('email');
    }

    /**
     * @test
     */
    public function EmailUniqueValidate()
    {
        $response1 = $this->post('/api/register', $this->data);
        $response2 = $this->post('/api/register', $this->data);
        $response2->assertSessionHasErrors('email');
    }
}
