<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = [
        'form_name',
        'user_id',
        'status',
    ];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
