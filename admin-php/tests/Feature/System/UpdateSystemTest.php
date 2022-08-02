<?php

namespace Tests\Feature\System;

use App\Models\Config;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateSystemTest extends TestCase
{
    /**
     * 更新系统资料
     * @test
     */
    public function updateSystemFormValidation()
    {
        $response = $this->putJson('/api/system/1', [
            'name' => $this->faker()->word(),
            'tel' => $this->faker()->phoneNumber()
        ]);
        $response->assertStatus(422);
    }
}
