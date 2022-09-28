<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Services\CodeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * 手机号不能为空
     * @test
     * @return void
     */
    public function phoneNumberCannotBeEmpty()
    {
        $response = $this->postJson('api/auth/register', []);

        $response->assertJsonValidationErrorFor('mobile');
    }

    /**
     * 手机号不能存在
     * @test
     * @return void
     */
    public function PhoneNumberCantExist()
    {
        $user = User::factory()->create();

        $response = $this->postJson('api/auth/register', [
            'mobile' => $user->mobile
        ]);

        $response->assertJsonValidationErrorFor('mobile');
    }


    /**
     * 密码不能为空
     * @test
     * @var Tests\Feature\Auth\fucntion
     */
    public function passwordCannotBeEmpty()
    {
        $response = $this->postJson('api/auth/register', [
            'mobile' => 199999999999,
        ]);

        $response->assertJsonValidationErrorFor('password');
    }

    /**
     * 两次密码输入不一致
     * @test
     * @return void
     */
    public function twoPasswordInput()
    {
        $response = $this->postJson('api/auth/register', [
            'mobile' => 199999999999,
            'password' => 'admin888',
            'password_confirmation' => 'admin999'
        ]);

        $response->assertJsonValidationErrorFor('password');
    }


    /**
     * 验证码不能为空
     * @test
     * @return void
     */
    public function VerificationCodeCannotBeEmpty()
    {
        $response = $this->postJson('api/auth/register', []);

        $response->assertJsonValidationErrorFor('code');
    }

    /**
     * 验证码输入错误
     * @test
     * @return void
     */
    public function CaptchaInputErrors()
    {
        $response = $this->postJson('api/auth/register', [
            'code' => 3333
        ]);

        $response->assertJsonValidationErrorFor('code');
    }

    /**
     * 成功注册
     * @test
     * @return void
     */
    public function successfulRegistration()
    {
        $mobile = 19999999999;
        $code = app(CodeService::class)->send($mobile);

        $response = $this->postJson('api/auth/register', [
            'mobile' => $mobile,
            'password' => 'admin888',
            'password_confirmation' => 'admin888',
            'code' => $code
        ]);

        $response->assertStatus(200);
    }
}
