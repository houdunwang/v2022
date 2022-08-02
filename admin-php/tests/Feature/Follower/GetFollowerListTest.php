<?php

namespace Tests\Feature\Follower;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetFollowerListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 获取关注列表
     * @test
     */
    public function getFollowerList()
    {
        $follower = create(User::class);
        $this->getJson('/api/follower/toggle/' . $follower->id)->assertStatus(200);

        $this->assertTrue($this->user->followers->contains($follower));
    }

    /**
     * 关注用户
     * @test
     */
    public function follower()
    {
        $follower = create(User::class);
        $this->getJson('/api/follower/toggle/' . $follower->id)->assertStatus(200);

        $this->assertTrue($this->user->followers->contains($follower));
    }

    /**
     * 取消关注
     * @test
     */
    public function unFollower()
    {
        $follower = create(User::class);
        $this->user->followers()->attach($follower->id);
        $this->assertCount(1, $this->user->followers);

        $this->getJson('/api/follower/toggle/' . $follower->id)->assertStatus(200);

        $this->assertCount(0, $this->user->fresh()->followers);
    }
}
