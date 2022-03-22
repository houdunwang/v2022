<?php

namespace Tests\Feature\ValidateCode;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestValideCodeTest extends TestCase
{
    /**
     * 发送邮件验证码
     * @test
     */
    public function emailVerificationCode()
    {
        $user = User::factory()->make();
        $this->post('/api/code/guest', [
            'account' => $user->email
        ])->assertOk();
    }

    /**
     * 邮箱格式错误
     * @test
     */
    public function emailFormatError()
    {
        $this->post('/api/code/guest', [
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
        $this->post('/api/code/guest', [
            'account' => $user->email
        ]);

        $this->post('/api/code/guest', [
            'account' => $user->email
        ])->assertStatus(403);
    }
}
