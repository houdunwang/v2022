<?php

namespace Tests\Feature\ValidateCode;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\TestCase;

class SendValideCodeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 发送邮件验证码
     * @test
     */
    public function emailVerificationCode()
    {
        $user = User::factory()->make();
        $this->post('/api/code/send', [
            'account' => $user->email
        ])->assertOk();
    }

    /**
     * 发送手机验证码
     */
    public function sendMobilePhoneVerificationCode()
    {
        $this->post('/api/code/send', [
            'account' => config('hd.mobile')
        ])->assertOk();
    }

    /**
     * 邮箱格式错误
     * @test
     */
    public function emailFormatError()
    {
        $this->post('/api/code/send', [
            'account' => 'hd'
        ])->assertSessionHasErrors('account');
    }

    /**
     * 重复发送验证码
     * @test
     */
    public function repeatSendVerificationCode()
    {
        $user = User::factory()->make();

        $this->post('/api/code/send', [
            'account' => $user->email
        ]);

        $this->post('/api/code/send', [
            'account' => $user->email
        ])->assertStatus(403);
    }

    /**
     * 不存在的用户发送验证码
     * @test
     */
    public function sendToNotExistUser()
    {
        create(User::class, ['email' => 'abc@qq.com']);

        $response = $this->postJson('/api/code/not_exist_user', ['account' => 'abc@qq.com']);

        $response->assertJsonValidationErrors('account');
    }

    /**
     * 向已经存在的用户发送验证码
     * @test
     */
    public function sendCodeToExistUser()
    {
        $user = create(User::class, ['email' => 'abc@qq.com']);

        $response = $this->postJson('/api/code/exist_user', ['account' => $user->email]);

        $response->assertSuccessful();
    }
}
