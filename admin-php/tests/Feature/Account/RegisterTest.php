<?php

namespace Tests\Feature\Account;

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
        $response->assertOk();
    }

    /**
     * 验证码输入错误
     * @test
     */
    public function captchaInputErrors()
    {
        $response = $this->post('/api/register', ['code' => '9999aa'] + $this->data());
        $response->assertSessionHasErrors('code');
    }

    /**
     * 非法邮箱验证
     * @test
     */
    public function registerAccountValidate()
    {
        $response = $this->post('/api/register', ['account' => 'hd'] + $this->data());
        $response->assertSessionHasErrors('account');
    }

    /**
     * @test
     */
    public function accountRequiredValidate()
    {
        $data = $this->data();
        unset($data['account']);
        $response = $this->post('/api/register', $data);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 帐号不能重复注册
     * @test
     */
    public function accountUniqueValidate()
    {
        $data = $this->data();
        $response1 = $this->post('/api/register', $data);
        $response2 = $this->post('/api/register', $data);
        $response2->assertSessionHasErrors('account');
    }

    /**
     * 确定密码输出错误
     * @test
     */
    public function determineTheErrorOutputPassword()
    {
        $this->post('/api/register', ['password' => 'abcd'] + $this->data())
            ->assertSessionHasErrors('password');
    }
}
