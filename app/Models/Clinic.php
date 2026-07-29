<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'city',
        'district',
        'address',
        'image',
        'description',
        'rating',
        'review_count',
    ];

    // Quan hệ với Bác sĩ (1 phòng khám có nhiều bác sĩ)
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    // Quan hệ với Dịch vụ thông qua bảng trung gian clinic_services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'clinic_services')
                    ->withPivot('starting_price', 'unit')
                    ->withTimestamps();
    }

    // Quan hệ 1-1 với Cấu hình ngôn ngữ / phiên dịch
    public function languages()
    {
        return $this->hasOne(ClinicLanguage::class);
    }

    // Quan hệ với các Tag hiển thị trên banner
    public function tags()
    {
        return $this->hasMany(ClinicTag::class);
    }

    // Quan hệ với danh sách Đặt lịch
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}