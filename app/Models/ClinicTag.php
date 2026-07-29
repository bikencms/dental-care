<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'tag_name',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}