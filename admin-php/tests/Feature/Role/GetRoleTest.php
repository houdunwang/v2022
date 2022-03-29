<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GetRoleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 获取角色列表
     * @test
     */
    public function getTheRoleList()
    {
        $this->signIn();
        $response = $this->getJson('/api/role');

        $response->assertStatus(200)->assertJson(fn (AssertableJson $json) => $json->has('data'));
    }

    /**
     * 获取角色
     * @test
     */
    public function getSingleRole()
    {
        $this->signIn();
        $role = create(Role::class);
        $response = $this->getJson('/api/role/' . $role->id);

        $response->assertStatus(200)->assertJson(fn (AssertableJson $json) => $json->has('data'));
    }
}
