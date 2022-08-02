<?php

namespace Tests\Feature\Site;

use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getSiteListTest extends TestCase
{
    /**
     * 获取站点列表
     * @test
     */
    public function getSiteList()
    {
        $response = $this->get('/api/site');

        $response->assertStatus(200)->assertJson([
            'data' => []
        ]);
    }

    /**
     * 站长只能获取自己的站点
     * @test
     */
    public function webmasterCanOnlyAccessYourSite()
    {
        $user = User::factory(1)->has(Site::factory())->create();

        $this->signIn($user[0]);

        $response = $this->getJson('/api/site?row=1000');

        $this->assertNotCount(Site::count(), $response['data']);
    }


    /**
     * 超级管理员可以获取所有站点
     * @test
     */
    public function SuperAdministratorCanObtainAllSite()
    {
        User::factory(5)->has(Site::factory())->create();

        $response = $this->getJson('/api/site?row=1000');
        $this->assertCount(Site::count(), $response['data']);
    }
}
