<?php

namespace Tests\Feature\Fans;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getFansListTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * 粉丝列表
     * @test
     */
    public function getFansList()
    {
        $fans = create(User::class, 10);
        $this->user->fans()->syncWithoutDetaching($fans->pluck('id'));

        $response = $this->getJson('/api/fans/' . $this->user->id);
        $response->assertSuccessful()->assertJson(['status' => 'success']);

        $this->assertCount(10, $this->user->fans);
    }
}
