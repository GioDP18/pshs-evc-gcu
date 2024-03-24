<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntakeInterviewForm extends Model
{
    protected $fillable = [
        'user_id',
        'name_of_student',
        'nickname',
        'elementary_school_graduated',
        'school_address',
        'age',
        'sex',
        'date_of_interview'
    ];

    use HasFactory;
}
