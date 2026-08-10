<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes; // 1. Import Trait
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use App\Models\ClinicUser;
use App\Models\User;
class Clinic extends Model
{
    use HasFactory;
    
    use SoftDeletes; // 2. Sử dụng Trait
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
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Scope lọc các clinic đã xuất bản (Public)
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope lọc các clinic dạng bản nháp (Draft)
     */
    public function scopeDraft($query)
    {
        return $query->where('is_published', false);
    }

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

    /**
     * Phòng khám thuộc về một Quận cụ thể.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function procedures()
    {
        return $this->hasMany(ClinicProcedure::class, 'clinic_id');
    }

    // Lấy User của Clinic này (Quan hệ 1-1 qua bảng clinic_user)
    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,       // Model đích muốn lấy
            ClinicUser::class, // Pivot/Intermediate Model
            'clinic_id',       // Khóa ngoại trên bảng clinic_user
            'id',              // Khóa chính trên bảng users
            'id',              // Khóa chính trên bảng clinics
            'user_id'          // Khóa ngoại trên bảng clinic_user
        );
    }
}