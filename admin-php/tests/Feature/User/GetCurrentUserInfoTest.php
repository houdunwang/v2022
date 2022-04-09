<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetCurrentUserInfoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 获取当前用户资料
     * @test
     */
    public function getTheCurrentUserInformation()
    {
        $this->signIn();
        $response = $this->getJson('/api/user/info')->assertSuccessful();

        $this->assertEquals($response['data']['id'], $this->user->id);
    }
}
