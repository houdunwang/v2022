<?php

namespace Tests\Feature\Comment;

use App\Models\Topic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CreateCommntTest extends TestCase
{
    /**
     * 评论内容表单验证
     * @test
     * @return void
     */
    public function theCommentFormValidation()
    {
        $response = $this->postJson('/api/comment');

        $response->assertStatus(422)->assertJsonMissingValidationErrors(['conent']);
    }

    /**
     * 成功发表评论
     * @test
     * @return void
     */
    public function commentOnSuccess()
    {
        $topic = $this->create(Topic::class);
        $content = $this->faker()->sentence();
        $response = $this->postJson('/api/comment/topic/' . $topic->id, [
            'content' => $content
        ]);

        $response->dd();

        $response->assertStatus(201)->assertJsonPath('data.content', $content);
    }
}
