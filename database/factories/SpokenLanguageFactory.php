<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpokenLanguage>
 */
class SpokenLanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => \App\Models\Profile::factory(),
            'name' => $this->faker->randomElement(['English', 'Spanish', 'French', 'German', 'Chinese', 'Japanese', 'Russian', 'Portuguese', 'Arabic', 'Hindi']),
            'proficiency' => $this->faker->randomElement(['Native', 'Fluent', 'Professional', 'Intermediate', 'Beginner']),
            'is_native' => $this->faker->boolean(20), // 20% chance of being native
        ];
    }
}
