<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Requests>
 */
class RequestsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'form_name' => $this->faker->randomElement([
                'Intake Interview Form',
                'Guidance Admission Slip',
                'Guidance Call Slip',
                'Parent Questionnaire Form',
                'Referral Form',
                'Cumulative Record Form',
                'Client Monitoring Form',
            ]),
            'user_id' => 1,
            'status' => 'pending'
        ];
    }
}
