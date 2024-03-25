<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentQuestionnaireForm extends Model
{
    protected $fillable = [
        'user_id',
        'campus',
        'child_name',
    ];

    use HasFactory;
}
