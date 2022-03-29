<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateRoleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->signIn();
    }
    /**
     * 字段不能为空
     * @test
     */
    public function updateRoleFieldCannotBeEmpty()
    {
        $role = create(Role::class);
        $response = $this->putJson("/api/role/{$role['id']}");

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 角色字段不能重复
     * @test
     */
    public function updateRoleFieldCannotBeRepeated()
    {
        $role1 = create(Role::class);
        $role2 = create(Role::class);

        $response = $this->putJson("/api/role/{$role2['id']}", [
            'name' => $role1->name,
            'title' => $role1->title,
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 更新添加角色
     * @test
     */
    public function updateRolesSuccessfully()
    {
        $role = create(Role::class);

        $response = $this->putJson("/api/role/{$role['id']}", [
            'name' => $role->name,
            'title' => $this->faker()->word(),
        ]);

        $response->assertSuccessful()->assertJson(['data' => []]);
    }
}
