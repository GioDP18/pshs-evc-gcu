<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concern extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_monitoring_form_id',
        'date',
        'area_of_concern',
        'action_taken',
        'recommendation',
    ];

    public function client_monitoring_form()
    {
        return $this->belongsTo(ClientMonitoringForm::class, 'client_monitoring_form_id');
    }
}
