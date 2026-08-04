<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'patient_name',
        'patient_email',
        'patient_phone',
        'service_type',
        'notes',
        'appointment_date',
        'start_time',
        'end_time',
        'status',
    ];

    protected $casts = [
        'appointment_date' => 'date:Y-m-d',
    ];

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
}