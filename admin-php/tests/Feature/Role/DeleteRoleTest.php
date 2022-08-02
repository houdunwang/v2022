<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class DeleteRoleTest extends TestCase
{
    /**
     * 删除角色
     * @test
     */
    public function deleteRole()
    {
        $role = create(Role::class);

        $response = $this->deleteJson("/api/site/{$this->site->id}/role/{$this->site->roles[0]->id}");

        $response->assertSuccessful()->assertJsonStructure(['message']);
    }
}
