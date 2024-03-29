<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BehaviorSpotted extends Model
{
    protected $fillable = [
        'referral_form_id',
        'b_1',
        'b_2',
        'b_3',
        'b_4',
        'b_5',
        'b_6',
        'b_7',
        'b_8',
        'b_9',
        'b_10',
        'b_11',
        'b_12',
        'b_13',
    ];

    use HasFactory;

    public function referral_fome()
    {
        return $this->belongsTo(ReferralForm::class);
    }
}
