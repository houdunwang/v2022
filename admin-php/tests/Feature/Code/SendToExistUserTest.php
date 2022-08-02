<?php

namespace Tests\Feature\Code;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendToExistUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 不已存在用户不允许发送
     * @test
     */
    public function thereAreUsersAreNotAllowedToSend()
    {
        $this->postJson('/api/code/exist_user', [
            'account' => '230007aa1698@qq.com'
        ])->assertStatus(422)->assertJsonValidationErrors(['account']);
    }
}
