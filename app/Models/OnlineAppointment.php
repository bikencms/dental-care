<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineAppointment extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'interest',
        'briefly',
        'status',
        'language',
        'token',
    ];

    protected $casts = [
        'interest' => 'array',
    ];
}