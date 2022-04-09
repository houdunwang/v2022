<?php

namespace Tests\Feature\Role;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SetRolePermissionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * 设置角色的权限
     * @test
     */
    public function setTheRolePermissions()
    {
        $permissions = create(Permission::class, [], 6);

        $role = create(Role::class);

        $response = $this->putJson('/api/role/permission/' . $role['id'], [
            'permissions' => $permissions->pluck('id')
        ])->assertSuccessful();

        $response->assertJson(['message' => '操作成功']);

        $this->assertEquals($role->permissions->count(), $permissions->count());
    }
}
