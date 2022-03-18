<?php

namespace Tests\Feature\Account;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    protected $data = [
        'account' => '2300071698@qq.com',
        'password' => 'admin888',
        'password_confirmation' => 'admin888'
    ];

    /**
     * 用户注册
     * @test
     */
    public function userRegister()
    {
        $response = $this->post('/api/register', $this->data);
        $response->assertOk();
    }

    /**
     * 非法邮箱验证
     * @test
     */
    public function registerAccountValidate()
    {
        $response = $this->post('/api/register', ['account' => 'hd'] + $this->data);
        $response->assertSessionHasErrors('account');
    }

    /**
     * @test
     */
    public function accountRequiredValidate()
    {
        $data = $this->data;
        unset($data['account']);
        $response = $this->post('/api/register', $data);
        $response->assertSessionHasErrors('account');
    }

    /**
     * @test
     */
    public function accountUniqueValidate()
    {
        $response1 = $this->post('/api/register', $this->data);
        $response2 = $this->post('/api/register', $this->data);
        $response2->assertSessionHasErrors('account');
    }

    /**
     * 确定密码输出错误
     * @test
     */
    public function determineTheErrorOutputPassword()
    {
        $this->post('/api/register', ['password' => 'abcd'] + $this->data)
            ->assertSessionHasErrors('password');
    }
}
