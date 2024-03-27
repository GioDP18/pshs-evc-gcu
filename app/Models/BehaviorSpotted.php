<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BehaviorSpotted extends Model
{
    use HasFactory;

    public function referral_fome()
    {
        return $this->belongsTo(ReferralForm::class);
    }
}
