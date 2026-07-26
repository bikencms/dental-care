<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OnlineAppointment;

class ConsultationAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'online_appointment_id',
        'name',
        'email',
        'arrival_date',
        'length_of_stay',
        'missing_teeth_duration',
        'health_condition',
        'smoking_amount',
        'xray_option',
        'xray_file_path',
        'smile_goals',
        'dental_conditions',
        'smile_photos',
    ];

    /**
     * Cast các trường JSON thành Array tự động khi gọi từ DB
     */
    protected $casts = [
        'arrival_date' => 'date',
        'smile_goals' => 'array',
        'dental_conditions' => 'array',
        'smile_photos' => 'array',
    ];

    public function onlineAppointment()
    {
        return $this->belongsTo(OnlineAppointment::class);
    }
}