<?php

namespace Tests\Feature\SiteModule;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getSiteModuleListTest extends TestCase
{
    /**
     * 获取站点模块列表
     * @test
     */
    public function accessToTheSiteListModule()
    {
        $response = $this->getJson("/api/site/{$this->site->id}/module");

        $response->assertSuccessful();
    }
}
