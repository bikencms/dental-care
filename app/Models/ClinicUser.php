<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClinicUser extends Pivot
{
    /**
     * Bảng tương ứng trong CSDL.
     *
     * @var string
     */
    protected $table = 'clinic_user';

    /**
     * Các thuộc tính có thể gán hàng loạt (Mass Assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'clinic_id',
        'user_id',
    ];

    /**
     * Lấy phòng khám liên kết.
     */
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }

    /**
     * Lấy tài khoản user liên kết.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}