<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 用户默认头像
     * @test
     */
    public function theUserTheDefaultAvatar()
    {
        $user = create(User::class);

        $this->assertEquals($user->avatar_url, url('images/avatar.png'));
    }

    /**
     * 关注列表
     * @test
     */
    public function userFollower()
    {
        $user1 = create(User::class);

        $user2 = create(User::class);

        $user1->followers()->toggle($user2);

        $this->assertEquals($user1->followers->first()->id, $user2->id);
    }

    /**
     * 粉丝列表
     * @test
     */
    public function userFans()
    {
        $user1 = create(User::class);

        $user2 = create(User::class);

        $user1->followers()->toggle($user2);

        $this->assertEquals($user2->fans->first()->id, $user1->id);
    }

    /**
     * 是否关注用户
     * @test
     */
    public function userIsFollower()
    {
        $user1 = create(User::class);

        $user2 = create(User::class);

        $user1->followers()->toggle($user2);

        $this->assertTrue($user1->isFollower($user2));
    }
}
