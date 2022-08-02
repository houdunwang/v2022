<?php

namespace Tests\Feature\SiteModule;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class addSiteModuleTest extends TestCase
{
    /**
     * 添加站点模块
     * @test
     */
    public function addSiteModule()
    {
        $response = $this->postJson("/api/site/{$this->site->id}/module", [
            'mid' => $this->site->modules->pluck('id')->toArray()
        ]);

        $response->assertStatus(200);
    }
}
