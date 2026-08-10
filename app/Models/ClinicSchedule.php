<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClinicSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'service_type',
        'day_of_week',
        'start_time',
        'end_time',
        'slot_duration_minutes',
        'max_patients_per_slot',
        'is_active',
    ];

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
}