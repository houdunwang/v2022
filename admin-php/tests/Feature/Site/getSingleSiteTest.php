<?php

namespace Tests\Feature\Site;

use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getSingleSiteTest extends TestCase
{
    /**
     * 获取单个站点
     * @test
     */
    public function getSingleSiteData()
    {
        $response = $this->get('/api/site/' . $this->site->id);

        $response->assertSuccessful()->assertJson(['data' => []]);
    }

    /**
     * 超级管理员可以获取所有站点
     * @test
     */
    public function superAdministratorCanObtainAllSite()
    {
        User::factory(1)->has(Site::factory())->create();

        $response = $this->getJson('/api/site/' . Site::oldest()->value('id'));

        $response->assertStatus(200);
    }
}
