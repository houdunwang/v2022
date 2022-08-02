<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserInfoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 获取当前用户资料
     * @test
     */
    public function currentUserInfo()
    {
        $this->signIn(create(User::class));
        $response = $this->getJson("/api/user/{$this->user->id}")->assertSuccessful();

        $this->assertEquals($response['data']['id'], $this->user->id);
    }
}
