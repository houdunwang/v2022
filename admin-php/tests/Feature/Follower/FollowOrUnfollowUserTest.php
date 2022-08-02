<?php

namespace Tests\Feature\Follower;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FollowOrUnfollowUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 关注用户
     * @test
     */
    public function followUser()
    {
        $user = create(User::class);

        $response = $this->getJson("/api/follower/toggle/{$user->id}");

        $response->assertStatus(200);
    }

    /**
     * 取消关注用户
     * @test
     */
    public function cancelTheFocusOnTheUser()
    {
        $user = create(User::class);
        $this->user->followers()->toggle($user);

        $response = $this->getJson("/api/follower/toggle/{$user->id}");

        $response->assertStatus(200);
    }
}
