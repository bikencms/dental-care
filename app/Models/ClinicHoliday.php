<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClinicHoliday extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'holiday_date',
        'title',
        'allow_emergency',
        'emergency_start_time',
        'emergency_end_time',
    ];

    protected $casts = [
        'holiday_date' => 'date:Y-m-d',
        'allow_emergency' => 'boolean',
    ];

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
}