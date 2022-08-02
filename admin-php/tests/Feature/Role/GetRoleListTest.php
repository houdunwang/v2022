<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetRoleListTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 获取角色列表
     * @test
     */
    public function getTheRoleList()
    {
        $response = $this->get("/api/site/{$this->site->id}/role");

        $response->assertSuccessful()->assertJson(['data' => []]);
    }
}
