<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IntakeInterviewForm>
 */
class IntakeInterviewFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'campus' => 'Carigara',
            'name_of_student' => 'Testing',
            'nickname' => 'Testing',
            'elementary_school_graduated' => 'Testing',
            'school_address' => 'Testing',
            'age' => 'Testing',
            'sex' => 'Testing',
            'date_of_interview' => 'Testing',
            'notes' => 'Testing',
            'interviewer' => 'Testing',
        ];
    }
}
