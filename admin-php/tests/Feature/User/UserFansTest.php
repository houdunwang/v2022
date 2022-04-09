<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserFansTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 粉丝列表
     * @test
     */
    public function userFansList()
    {
        $user1 = create(User::class);
        $user2 = create(User::class);

        $user1->followers()->toggle($user2);

        $response = $this->getJson('/api/fans/' . $user2->id)->assertOk();

        $this->assertEquals($user1->followers()->first()->id, $user2->id);
    }
}
