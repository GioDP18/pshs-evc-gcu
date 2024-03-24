<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuidanceAdmissionSlip extends Model
{
    protected $fillable = [
        'user_id',
        'name_of_student',
        'grade_and_section',
        'dear',
        'last_visited_date',
        'last_visited_time_start',
        'last_visited_time_end',
        'guidance_counselor',
        'recieved_by'
    ];

    use HasFactory;
}
