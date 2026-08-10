<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'name',
        'avatar',
        'title',
        'has_studied_abroad',
        'is_expert_10_years',
        'has_high_degree',
        'is_association_leader',
        'is_foreign_expat',
        'is_international_member',
        'is_trainer_speaker',
    ];

    // Thuộc về 1 phòng khám
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}