<?php

namespace Tests\Feature\Permission;

use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class DelPermissionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 删除权限
     * @test
     */
    public function removePermissions()
    {
        $this->signIn();
        $permission = create(Permission::class);
        $response = $this->deleteJson("/api/permission/{$permission['id']}");

        $response->assertOk()->assertJson(fn (AssertableJson $json) => $json->has('message')->etc());
    }
}
