<?php

namespace Tests\Feature\Permission;

use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GetPermissionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 获取权限列表
     * @test
     */
    public function getPermissionsList()
    {
        $response = $this->getJson("api/site/{$this->site->id}/permission");

        $response->assertSuccessful()->assertJson(['data' => []]);
    }
}
