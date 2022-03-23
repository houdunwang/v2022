<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;

    // protected $seed = true;

    // protected function setUp(): void
    // {
    //     parent::setUp();
    // }

    protected function signIn(User $user = null)
    {
        $user = $user ?? create(User::class);
        $this->actingAs($user);

        $this->user = $user;
        return $this;
    }
}
