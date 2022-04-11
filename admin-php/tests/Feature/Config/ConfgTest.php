<?php

namespace Tests\Feature\Config;

use App\Models\Config;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfgTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 更新网站配置
     * @test
     */
    public function updateSiteConfiguration()
    {
        $this->signIn();
        $response = $this->putJson('/api/config/test', [
            'data' => 'abcdefg'
        ])->assertOk();

        $response->assertSee('abcdefg');
    }
}
