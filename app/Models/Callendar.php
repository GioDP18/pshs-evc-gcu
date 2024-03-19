<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Callendar extends Model
{
    protected $fillable = [
        'available_time',
        'date'
    ];

    use HasFactory;
}
