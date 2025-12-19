<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => \App\Models\Employer::factory(),
            'title' => fake()->jobTitle(),
            'description' => implode("\n\n", fake()->paragraphs(5)),
            'salary' => fake()->numberBetween(5_000, 150_000),
            'location' => fake()->city(),
            'category' => fake()->randomElement(Job::$categories),
            'experience' => fake()->randomElement(Job::$experience)
        ];
    }
}
