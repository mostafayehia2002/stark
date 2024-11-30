<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactUs>
 */
class ContactUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'message' => $this->faker->sentence(),
            'is_user' => $this->faker->boolean(),
        ];
    }
}
