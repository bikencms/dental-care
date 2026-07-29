<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'selected_services',
        'appointment_time',
        'status',
        'notes',
    ];

    // Lịch hẹn thuộc về 1 phòng khám
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}