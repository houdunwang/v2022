<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
        ];
    }
}
