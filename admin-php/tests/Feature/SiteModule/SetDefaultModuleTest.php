<?php

namespace Tests\Feature\SiteModule;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SetDefaultModuleTest extends TestCase
{
    /**
     * 设置站点默认模块
     * @test
     */
    public function setTheSiteDefaultModule()
    {
        $response = $this->getJson("/api/set_default_module/site/{$this->site->id}/module/1");

        $response->assertStatus(200);
    }
}
