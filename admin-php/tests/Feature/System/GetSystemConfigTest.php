<?php

namespace Tests\Feature\System;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetSystemConfigTest extends TestCase
{
    /**
     * 获取系统资料
     * @test
     */
    public function dataAcquisitionSystem()
    {
        $response = $this->getJson('/api/system');
        $response->assertSuccessful();
    }
}
