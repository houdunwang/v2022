<?php

namespace Tests\Feature\Module;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Storage;
use Tests\TestCase;

class DesignModuleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * 设计添加新模块
     * @test
     */
    public function addANewModuleDesign()
    {
        $name = $this->faker()->word();

        $response = $this->postJson("/api/module", [
            'title' => $this->faker()->word(),
            'name' => $name,
            'version' => '1.0.0',
            'author' => '后盾人'
        ]);

        $response->assertStatus(200);
        Storage::disk('addons')->deleteDirectory($name);
    }

    /**
     * 设计模块表单验证
     * @test
     */
    public function designModuleFormValidation()
    {
        $response = $this->postJson("/api/module", []);

        $response->assertStatus(422)->assertJsonValidationErrors(['title', 'name', 'version', 'author']);
    }
}
