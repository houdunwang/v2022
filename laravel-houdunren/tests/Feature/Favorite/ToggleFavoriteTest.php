<?php

namespace Tests\Feature\Favorite;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Topic;

class ToggleFavoriteTest extends TestCase
{
    /**
     * 收藏贴子
     * @test
     * @return void
     */
    public function collectionOfPosts()
    {
        $topic = $this->create(Topic::class);
        $response = $this->postJson('/api/favorite/topic/' . $topic->id);
        $response->dd();
        $response->assertStatus(200);
    }
}
