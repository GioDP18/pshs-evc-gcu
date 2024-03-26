<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuidanceCallSlip extends Model
{
    protected $fillable = [
        'campus',
        'date',
        'time',
        'type_of_counseling',
        'counseling_time_start',
        'counseling_time_end',
        'guidance_counselor',
        'teacher_in_charge',
    ];


    use HasFactory;
}