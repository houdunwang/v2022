<?php

namespace Tests\Feature\Code;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $this->post('/api/code/send', ['account' => $this->user->email])->assertSuccessful();
    }

    /**
     * 发送手机验证码
     * test
     */
    public function sendMobilePhoneVerificationCode()
    {
        $this->post('/api/code/send', ['account' => $this->user->mobile])->assertSuccessful();
    }

    /**
     * 邮箱格式错误
     * @test
     */
    public function emailFormatError()
    {
        $this->postJson('/api/code/send', [
            'account' => 'hd'
        ])->assertJsonValidationErrors(['account']);
    }

    /**
     * 重复发送验证码
     * @test
     */
    public function repeatSendVerificationCode()
    {
        $this->post('/api/code/send', ['account' => $this->user->email]);

        $this->post('/api/code/send', ['account' => $this->user->email])->assertStatus(403);
    }
}
