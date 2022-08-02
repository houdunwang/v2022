<?php

namespace Tests\Feature\Code;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CurrentUserSendCodeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 当前用户发送验证码
     * @test
     */
    public function currentUserToSendVerificationCode()
    {
        $response = $this->postJson('/api/code/current_user/email')->assertSuccessful();

        $response->assertJson(['status' => 'success']);
    }
}
