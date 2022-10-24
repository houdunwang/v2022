<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithFaker, RefreshDatabase;

    protected $seed = true;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    protected function create($class, $count = null, $attributes = [])
    {
        return $class::factory($count)->create($attributes);
    }

    protected function login($user = null)
    {
        $user = $user ?? User::find(1);
        $this->actingAs($user);
        $this->user = $user;
        return $this;
    }
}
