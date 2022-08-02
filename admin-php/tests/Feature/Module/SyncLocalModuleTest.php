<?php

namespace Tests\Feature\Module;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SyncLocalModuleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 同步本地模块到数据表
     * @test
     */
    public function synchronizationModuleToLocalDataTable()
    {
        $this->getJson("/api/module/sync/module")->assertSuccessful();
    }
}
