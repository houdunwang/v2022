<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    protected function data()
    {
        $user = User::factory()->make();
        app('code')->clear($user->email);
        return [
            'account' => $user->email,
            'password' => 'admin888',
            'password_confirmation' => 'admin888',
            'code' => app('code')->email($user->email)
        ];
    }

    /**
     * 用户注册成功
     * @test
     */
    public function userRegister()
    {
        $response = $this->post('/api/register', $this->data());
        $response->assertSuccessful();
    }

    /**
     * 验证码输入错误
     * @test
     */
    public function captchaInputErrors()
    {
        $response = $this->postJson('/api/register', ['code' => '9999aa'] + $this->data());
        $response->assertJsonValidationErrors('code');
    }

    /**
     * 非法邮箱验证
     * @test
     */
    public function registerAccountValidate()
    {
        $response = $this->postJson('/api/register', ['account' => ''] + $this->data());

        $response->assertJsonValidationErrors('account');
    }

    /**
     * 帐号不能为空
     * @test
     */
    public function accountRequiredValidate()
    {
        $data = $this->data();
        unset($data['account']);
        $response = $this->postJson('/api/register', $data);
        $response->assertJsonValidationErrors('account');
    }

    /**
     * 帐号不能重复注册
     * @test
     */
    public function accountUniqueValidate()
    {
        $data = $this->data();
        $this->postJson('/api/register', $data);
        $response2 = $this->postJson('/api/register', $data);
        $response2->assertJsonValidationErrors('account');
    }

    /**
     * 确定密码输出错误
     * @test
     */
    public function determineTheErrorOutputPassword()
    {
        $this->postJson('/api/register', ['password' => ''] + $this->data())
            ->assertJsonValidationErrors('password');
    }
}
