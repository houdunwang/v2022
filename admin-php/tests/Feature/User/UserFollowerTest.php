<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserFollowerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 获取关注列表
     * @test
     */
    public function getFollowerList()
    {
        $this->signIn();

        $user = create(User::class);
        $this->user->followers()->toggle($user);

        $response = $this->getJson('/api/follower/' . $this->user->id)->assertOk();

        $this->assertEquals($this->user->followers()->first()->id, $response['data'][0]['id']);
    }

    /**
     * 关注用户
     * @test
     */
    public function followerUser()
    {
        $this->signIn();
        $user = create(User::class);

        $response = $this->getJson('/api/follower/toggle/' . $user->id)->assertOk();

        $response->assertJson(['data' => true]);

        $response->dd();
        $this->assertEquals($this->user->followers()->first()->id, $user->id);
    }
}
