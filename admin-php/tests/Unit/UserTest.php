<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * 用户默认头像
     * @test
     */
    public function theUserTheDefaultAvatar()
    {
        $user = create(User::class);

        $this->assertEquals($user->avatar_url, url('images/avatar.png'));
    }
}
