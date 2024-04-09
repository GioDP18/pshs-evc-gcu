<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date',
        'time',
        'user_id',
    ];

    use HasFactory;

    public function reserved_user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
