<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicScheduleOverride extends Model
{
    protected $fillable = [
        'clinic_id',
        'service_type',
        'override_date',
        'override_type',
        'start_time',
        'end_time',
        'reason',
    ];
}