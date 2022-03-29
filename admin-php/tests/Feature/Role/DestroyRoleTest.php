<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroyRoleTest extends TestCase
{
    /**
     * 删除角色
     * @test
     */
    public function delRole()
    {
        $this->signIn();
        $role = create(Role::class);
        $response = $this->deleteJson('/api/role/' . $role->id);

        $response->assertStatus(200)->assertJson(['message' => '删除成功']);
    }
}
