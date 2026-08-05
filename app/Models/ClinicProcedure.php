<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicProcedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'service_id',
        'procedure_name',
        'procedure_price',
        'procedure_duration',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function procedures()
    {
        return $this->hasMany(ClinicProcedure::class);
    }

}