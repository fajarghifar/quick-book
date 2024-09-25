<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'slug' => Str::slug($this->faker->unique()->sentence(3)),
            'duration' => $this->faker->numberBetween(15, 120), // duration in minute
            'price' => $this->faker->numberBetween(1500, 10000), // price in cents
        ];
    }
}
