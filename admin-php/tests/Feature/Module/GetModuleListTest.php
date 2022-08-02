<?php

namespace Tests\Feature\Module;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class GetModuleListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 非超级管理员不能获取列表
     * @test
     */
    public function theSuperAdministratorCantAccessList()
    {
        Auth::logout();
        $this->signIn(create(User::class));
        $response = $this->getJson('/api/module');
        $response->assertStatus(403);
    }

    /**
     * 获取模块列表
     * @test
     */
    public function getModuleList()
    {
        $response = $this->getJson('/api/module');

        $response->assertStatus(200);
    }
}
