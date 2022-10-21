<?php

namespace Tests\Feature\Topic;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTopicTest extends TestCase
{
    /**
     * 未登录用户允许发贴
     * @test
     */
    public function notLoggedInUserAllowPosting()
    {
        $topic = $this->create(Topic::class);
        $response = $this->putJson("/api/topic/{$topic['id']}");
        $response->assertStatus(401);
    }

    /**
     * 表单数据验证
     * @test
     * @return void
     */
    public function theFormDataValidation()
    {
        $this->login();
        $topic = $this->create(Topic::class);
        $response = $this->putJson("/api/topic/{$topic['id']}", []);
        $response->assertStatus(422);
    }

    /**
     * 成功发贴
     * @test
     * @return void
     */
    public function successfulPosting()
    {
        $this->login();
        $topic = $this->create(Topic::class);
        $response = $this->putJson("/api/topic/{$topic['id']}", [
            'title' => $this->faker()->sentence()
        ] + $topic->toArray());

        $response->assertStatus(200)->assertJsonPath('data.id', $topic->id);
    }
}
