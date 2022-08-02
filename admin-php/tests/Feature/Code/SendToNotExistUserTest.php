<?php

namespace Tests\Feature\Code;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendToNotExistUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 已存在用户不允许发送
     * @test
     */
    public function existingUsersAreNotAllowedToSend()
    {
        $this->postJson('/api/code/not_exist_user', [
            'account' => '2300071698@qq.com'
        ])->assertStatus(422)->assertJsonValidationErrors(['account']);
    }
}
