<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMonitoringForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'campus',
        'adviser',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function concern()
    {
        return $this->hasMany(Concern::class, 'client_monitoring_form_id');
    }
}
