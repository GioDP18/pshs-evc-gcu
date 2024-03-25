<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'available_time',
        'date',
        'user_id_reserved',
    ];

    use HasFactory;

    public function reserved_user(){
        return $this->belongsTo(User::class);
    }
}
