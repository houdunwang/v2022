<?php

namespace Tests\Feature\Permission;

use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetPermissionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * 获取权限列表
     * @test
     */
    public function getPermissionsList()
    {
        Permission::create(['name' => $this->faker()->word(1), 'title' => $this->faker()->title]);

        $response = $this->get('/api/permission');

        $response->assertStatus(200)->assertJson(['data' => []]);
    }

    /**
     * 获取单一权限信息
     * @test
     */
    public function forSingleAccessInformation()
    {
        $permission = Permission::create(['name' => $this->faker()->word(1), 'title' => $this->faker()->title]);

        $response = $this->get('/api/permission/' . $permission->id);

        $response->assertStatus(200)->assertJson(['data' => []]);
    }
}
