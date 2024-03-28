<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GuidanceAdmissionSlip>
 */
class GuidanceAdmissionSlipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 'Testing',
            'campus' => 'Testing',
            'name_of_student' => 'Testing',
            'grade_and_section' => 'Testing',
            'dear' => 'Testing',
            'last_visited_date' => 'Testing',
            'last_visited_time_start' => 'Testing',
            'last_visited_time_end' => 'Testing',
            'guidance_counselor' => 'Testing',
            'recieved_by' => 'Testing'
        ];
    }
}
