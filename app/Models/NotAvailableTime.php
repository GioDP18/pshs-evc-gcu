<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotAvailableTime extends Model
{
    protected $fillable = [
        'date',
        'time',
    ];

    use HasFactory;
}
