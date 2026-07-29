<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
    ];

    // Quan hệ ngược lại với phòng khám
    public function clinics()
    {
        return $this->belongsToMany(Clinic::class, 'clinic_services')
                    ->withPivot('starting_price', 'unit')
                    ->withTimestamps();
    }
}