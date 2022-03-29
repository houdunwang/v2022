<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'title' => $this->faker->word(),
            'guard_name' => 'sanctum'
        ];
    }
}
