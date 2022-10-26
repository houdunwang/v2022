<?php

namespace Tests\Feature\Comment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Topic;
use App\Models\User;

class DeleteCommntTest extends TestCase
{
    use Comment;
    /**
     * 评论只允许自己或超级管理员删除
     * @test
     * @return void
     */
    public function deleteCommentsOnlyAllowYourselfOrSuperAdministrator()
    {
        $user = $this->create(User::class);
        $this->login($user);
        $response = $this->deleteJson('/api/comment/' . $this->comment()->id);

        $response->assertStatus(403);
    }

    /**
     * 超级管理员不限制
     * @test
     */
    public function withoutLimitingTheSuperAdministrator()
    {
        $response = $this->deleteJson('/api/comment/' . $this->comment()->id);

        $response->assertStatus(200);
    }
}
