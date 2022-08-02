<?php

namespace Tests\Feature\Role;

use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SetRolePermissionTest extends TestCase
{
    /**
     * 设置角色权限
     * @test
     **/
    public function setTheRolePermissions()
    {
        $role = $this->site->roles->first();
        $response = $this->postJson(
            "/api/site/{$this->site->id}/role/{$role->id}/permission",
            ['permissions' => $this->site->permissions->pluck('name')]
        );

        $response->assertSuccessful();
    }
}
