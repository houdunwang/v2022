<?php

namespace Tests\Feature\Role;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreRoleTest extends TestCase
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
    public function roleFieldCannotBeEmpty()
    {
        $response = $this->postJson('/api/role');

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 角色字段不能重复
     * @test
     */
    public function roleFieldCannotBeRepeated()
    {
        $role = create(Role::class);

        $response = $this->postJson('/api/role', [
            'name' => $role->name,
            'title' => $role->title,
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors(['name', 'title']);
    }

    /**
     * 成功添加角色
     * @test
     */
    public function addingRolesSuccessfully()
    {
        $response = $this->postJson('/api/role', [
            'name' => $this->faker()->word(),
            'title' => $this->faker()->word(),
        ]);

        $response->assertSuccessful()->assertJson(['data' => []]);
    }
}
