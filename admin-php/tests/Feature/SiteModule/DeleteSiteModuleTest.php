<?php

namespace Tests\Feature\SiteModule;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteSiteModuleTest extends TestCase
{
    /**
     * 删除站点模块
     * @test
     */
    public function deleteSitesModule()
    {
        $response = $this->deleteJson("/api/site/{$this->site->id}/module/1");

        $response->assertStatus(200);
    }
}
