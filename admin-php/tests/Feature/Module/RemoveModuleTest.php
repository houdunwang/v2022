<?php

namespace Tests\Feature\Module;

use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RemoveModuleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 删除模块
     * @test
     */
    public function removeSystemModule()
    {
        $name = $this->faker()->word();

        $response = $this->postJson("/api/module", [
            'title' => $this->faker()->word(),
            'name' => $name,
            'version' => '1.0.0',
            'author' => '后盾人'
        ])->assertSuccessful();

        $response = $this->deleteJson("/api/module/{$response['data']['id']}")->assertSuccessful();
    }
}
