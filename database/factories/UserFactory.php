<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'middlename' => $this->faker->lastName(),
            'lastname' => $this->faker->lastName(),
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'date_of_birth' => $this->faker->date(),
            // 'role' => $this->faker->randomElement(['gcu_staff', 'parent', 'teacher','student']),
            'role' => 'student',
            'contact_number' => $this->faker->phoneNumber(),
            'signature' => 'signatures/PsH7sipYTbuzFCa8AcGyLpcK1ZoGdBxuG9SCZFKv.png',
            'id_number' => $this->faker->regexify('/^\w{2}-\w{4}-\w{3}$/'),
            'grade_level' => 7,
            'section' => $this->faker->randomElement(['Diamond', 'Emerald', 'Ruby']),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
