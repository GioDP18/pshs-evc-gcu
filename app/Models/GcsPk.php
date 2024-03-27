<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GcsPk extends Model
{
    protected $fillable = [
        'gcs_id',
        's1',
        's2',
        's3',
        's4',
        's5',
        'gs1',
        'gs2',
        'gs3',
        'gs4',
        'gs5',
    ];

    use HasFactory;

    
    public function guidance_call_slip()
    {
        return $this->belongsTo(GuidanceCallSlip::class, 'gcs_id');
    }
}
