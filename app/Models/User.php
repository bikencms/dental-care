<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
        'interest',
        'briefly',
        'plain_password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Lấy phòng khám đầu tiên của User
    public function myClinic()
    {
        return $this->belongsToMany(Clinic::class, 'clinic_user')->first();
    }
   
    public function clinic(): HasOneThrough
    {
        return $this->hasOneThrough(
            Clinic::class,
            ClinicUser::class,
            'user_id',         // Khóa ngoại trên bảng clinic_user
            'id',              // Khóa chính trên bảng clinics
            'id',              // Khóa chính trên bảng users
            'clinic_id'        // Khóa ngoại trên bảng clinic_user
        );
    }

    public function isAdmin(): bool
    {
        // Cấu hình điều kiện Admin của bạn ở đây (ID = 1, Email admin, hoặc role == 'admin')
        return $this->id === 1 
            || in_array($this->email, ['Thy.nguyen85@gmail.com', 'minhbiken14@gmail.com', 'admin@example.com']) 
            || $this->role === 'Admin';
    }

    public function hasClinicAccess($clinicId): bool
    {
        // Nếu là Admin thì luôn có quyền
        if ($this->isAdmin()) {
            return true;
        }

        // Ngược lại kiểm tra trong bảng clinic_user
        return \App\Models\ClinicUser::where('user_id', $this->id)
                ->where('clinic_id', $clinicId)
                ->exists();
    }
}
