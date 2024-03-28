<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GuidanceCallSlip>
 */
class GuidanceCallSlipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'campus' => 'Testing',
            'date' => 'Testing',
            'time' => 'Testing',
            'type_of_counseling' => 'Testing',
            'counseling_time_start' => 'Testing',
            'counseling_time_end' => 'Testing',
            'guidance_counselor' => 'Testing',
            'teacher_in_charge' => 'Testing',
        ];
    }
}
