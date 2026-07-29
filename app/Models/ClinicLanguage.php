<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'has_free_english_support',
        'has_paid_interpreter',
        'interpreter_hourly_rate',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}