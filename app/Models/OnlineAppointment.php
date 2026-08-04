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

    public function consultationAssessment()
    {
        return $this->hasOne(ConsultationAssessment::class, 'online_appointment_id');
    }

     public function appointment()
    {
        return $this->hasOne(Appointment::class, 'patient_email', 'email');
    }
}