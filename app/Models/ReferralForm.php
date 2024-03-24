<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralForm extends Model
{
    protected $fillable = [
        'user_id',
        'name_of_student',
        'grade_and_section',
        'date',
        'concern',
        'brief_description',
        'intervention_done',
        'follow_up',
        'behaviors_spotted',
        'others',
        // 'referrer_id'
    ];

    use HasFactory;
}
