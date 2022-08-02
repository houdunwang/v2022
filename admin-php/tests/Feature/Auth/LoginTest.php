<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $data = [
        'account' => '2300071698@qq.com',
        'password' => 'admin888'
    ];

    /**
     * 登录成功
     * @test
     */
    public function userLogin()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->post('/api/login', ['account' => $user->email, 'password' => 'admin888']);

        $response->assertSee('token');
    }

    /**
     * 邮箱格式不合法
     * @test
     */
    public function loginAccountRule()
    {
        $response = $this->post('/api/login', ['account' => 'hd', 'password' => 'admin888']);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 邮箱不能为空
     * @test
     */
    public function accountRequireRule()
    {
        $response = $this->post('/api/login', ['password' => 'admin888']);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 密码输入错误
     * @test
     */
    public function passwordPostWrong()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login', ['account' => $user->email, 'password' => 'hd888']);
        $response->assertSessionHasErrors('password');
    }

    /**
     * 邮箱不存在
     * @test
     */
    public function accountNotExists()
    {
        $response = $this->post('/api/login', ['account' => '3434@qq.com', 'password' => 'hd888']);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 手机号登录
     * @test
     */
    public function loginByMobile()
    {
        $user = User::factory()->create(['mobile' => '139' . $this->faker()->randomNumber(8)]);

        $response = $this->postJson('/api/login', ['account' => $user->mobile, 'password' => 'admin888']);
        $response->assertOk();
    }
}
