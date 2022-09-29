<?php

namespace Tests\Feature\Topic;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateTopicTest extends TestCase
{
    /**
     * 标题内容不能为空
     * @test
     * @return void
     */
    public function TheTitleAndContentCannotBeEmpty()
    {
        $user = $this->create(User::class);
        $this->actingAs($user);
        $response = $this->postJson('api/topic');
        $response->assertStatus(422)->assertJsonValidationErrors(['title', 'content']);
    }

    /**
     * 标题长度校验
     * @test
     * @return void
     */
    public function TitleCheckLength()
    {
        $user = $this->create(User::class);
        $this->actingAs($user);
        $response = $this->postJson('api/topic', ['title' => 'hd']);
        $response->assertStatus(422)->assertJsonValidationErrors(['title']);
    }

    /**
     * 成功发表贴子
     * @test
     * @return void
     */
    public function successfulPublishedPosts()
    {
        $user = $this->create(User::class);
        $this->actingAs($user);
        $response = $this->postJson('api/topic', [
            'title' => $this->faker()->sentence(),
            'content' => $this->faker()->paragraph()
        ]);

        $response->assertStatus(200)->assertJson(['message' => true]);
    }
}
