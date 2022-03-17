<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected $data = [
        'email' => '2300071698@qq.com',
        'password' => 'admin888'
    ];

    /**
     * 登录成功
     * @test
     */
    public function userLogin()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login', ['email' => $user->email, 'password' => 'admin888']);

        $response->assertSee('token');
    }

    /**
     * 邮箱合法性
     * @test
     */
    public function loginEmailRule()
    {
        $response = $this->post('/api/login', ['email' => 'hd', 'password' => 'admin888']);
        $response->assertSessionHasErrors('email');
    }

    /**
     * 邮箱不能为空
     * @test
     */
    public function emailRequireRule()
    {
        $response = $this->post('/api/login', ['password' => 'admin888']);
        $response->assertSessionHasErrors('email');
    }

    /**
     * 密码输入错误
     * @test
     */
    public function passwordPostWrong()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login', ['email' => $user->email, 'password' => 'hd888']);
        $response->assertSessionHasErrors('password');
    }

    /**
     * 邮箱不存在
     * @test
     */
    public function emailNotExists()
    {
        $response = $this->post('/api/login', ['email' => '3434@qq.com', 'password' => 'hd888']);
        $response->assertSessionHasErrors('email');
    }
}
