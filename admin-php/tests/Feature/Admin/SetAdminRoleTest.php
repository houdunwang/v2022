<?php

namespace Tests\Feature\Admin;

use App\Models\Role;
use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SetAdminRoleTest extends TestCase
{
    /**
     * 设置管理员角色
     * @test
     */
    public function setAdminRoles()
    {
        $this->site->admins()->attach($this->user->id);

        $response = $this->postJson(
            "/api/site/{$this->site->id}/admin/{$this->user->id}/role",
            ['roles' => $this->site->roles->pluck('id')]
        );

        $response->assertStatus(200)->assertJson(['status' => 'success']);
        $this->assertCount(1, $this->site->admins);
    }
}
