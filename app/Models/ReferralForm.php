<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralForm extends Model
{
    protected $fillable = [
        'campus',
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

    public function behavior_spotted()
    {
        return $this->hasOne(BehaviorSpotted::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function referrer_info(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
