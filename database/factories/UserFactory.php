<?php

namespace Database\Factories;

use App\Enums\UserStatus;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = [UserType::OWNER,UserType::RENTER];
        $statuses = [UserStatus::ACTIVE,UserStatus::INACTIVE];
        return [
            'full_name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'phone' => $this->faker->phoneNumber(),
            'type' => $this->faker->randomElement($types),
            'business_name' => $this->faker->company(),
            'business_license' => $this->faker->uuid(),
            'address' => $this->faker->address(),
            'status' => $this->faker->randomElement($statuses),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
