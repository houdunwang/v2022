<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Str;
use Tests\TestCase;

class UpdateRoleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 字段不能为空
     * @test
     */
    public function roleFieldCannotBeEmpty()
    {
        $role = create(Role::class, null, ['site_id' => $this->site->id]);

        $response = $this->putJson("/api/site/{$this->site->id}/role/{$role['id']}");

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'description']);
    }

    /**
     * 不能添加已经存在的字段
     * @test
     */
    public function dontUpdateExistingRoleFields()
    {
        $role1 = create(Role::class, null, ['site_id' => $this->site->id]);
        $role2 = create(Role::class, null, ['site_id' => $this->site->id]);
        $response = $this->putJson("/api/site/{$this->site->id}/role/{$role2['id']}", [
            'name' => $role1->name,
            'description' => $role1->description
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors(['name']);
    }

    /**
     * 更新站点角色
     * @test
     */
    public function updateSiteRole()
    {
        $role = create(Role::class, null, [
            'name' => $this->faker()->title(),
            'description' => $this->faker()->title(),
            'site_id' => $this->site->id, 'name' => $this->faker()->word()
        ]);

        $response = $this->putJson("/api/site/{$this->site['id']}/role/{$role['id']}", [
            'name' => $this->faker()->title(),
            'description' => $this->faker()->title(),
        ]);

        $response->assertSuccessful()->assertJson(['data' => []]);
    }
}
