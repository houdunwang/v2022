<?php

namespace Tests\Feature\Admin;

use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetAdminListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 管理员列表
     * @test
     */
    public function siteAdminList()
    {
        $response = $this->getJson("/api/site/{$this->site->id}/admin");

        $response->assertSuccessful()->assertJson(['data' => []]);
    }
}
