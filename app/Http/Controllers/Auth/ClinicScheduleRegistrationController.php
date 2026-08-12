<?php
namespace App\Http\Controllers\Auth;

use App\Models\ClinicSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class ClinicScheduleRegistrationController extends Controller
{
    /**
     * Hiển thị giao diện cấu hình lịch cố định theo clinic_id
     */
    public function index($id)
    {
        $clinicId = $id;

        $currentMonth = Carbon::now()->format('m/Y');
        $nextMonth = Carbon::now()->addMonth()->format('m/Y');

        // Lấy danh sách lịch đã lưu của phòng khám
        $schedules = ClinicSchedule::where('clinic_id', $clinicId)
            ->get()
            ->groupBy('day_of_week');

        // Lấy cấu hình chung (thời lượng slot & số bệnh nhân) từ bản ghi đầu tiên nếu có
        $firstSchedule = ClinicSchedule::where('clinic_id', $clinicId)->first();
        $currentDuration = $firstSchedule ? $firstSchedule->slot_duration_minutes : 30;
        $currentMaxPatients = $firstSchedule ? $firstSchedule->max_patients_per_slot : 1;
        $currentServiceType = $firstSchedule ? $firstSchedule->service_type : 'implant';

        return view('auth.clinic.partials.recurring', compact(
            'clinicId', 
            'schedules', 
            'currentMonth', 
            'nextMonth',
            'currentDuration',
            'currentMaxPatients',
            'currentServiceType'
        ));
    }

    /**
     * Lưu/Cập nhật khung giờ cố định, thời lượng slot và số bệnh nhân/ca
     */
    public function store(Request $request, $id)
    {
        $clinicId = $id;

        $request->validate([
            'service_type'            => 'required|in:implant,veneers',
            'schedules'               => 'required|array',
            'schedules.*.day_of_week' => 'required|integer|between:0,6',
            'schedules.*.start_time'  => 'required_if:schedules.*.is_active,1|nullable|date_format:H:i',
            'schedules.*.end_time'    => 'required_if:schedules.*.is_active,1|nullable|date_format:H:i|after:schedules.*.start_time',
            'slot_duration_minutes'   => 'required|integer|min:15|max:120',
            'max_patients_per_slot'   => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($request, $clinicId) {
            $serviceType = $request->service_type;
            $slotDuration = $request->slot_duration_minutes;
            $maxPatients = $request->max_patients_per_slot;

            foreach ($request->schedules as $item) {
                $isActive = isset($item['is_active']) && $item['is_active'] == '1';

                ClinicSchedule::updateOrCreate(
                    [
                        'clinic_id'    => $clinicId,
                        'service_type' => $serviceType,
                        'day_of_week'  => $item['day_of_week'],
                    ],
                    [
                        'start_time'            => $isActive ? $item['start_time'] . ':00' : '07:00:00',
                        'end_time'              => $isActive ? $item['end_time'] . ':00' : '19:00:00',
                        'slot_duration_minutes' => $slotDuration,
                        'max_patients_per_slot' => $maxPatients,
                        'is_active'             => $isActive,
                    ]
                );
            }

            $currentMonth = Carbon::now()->format('m/Y');
            $nextMonth = Carbon::now()->addMonth()->format('m/Y');

            return redirect()->back()->with('success', "Đã cập nhật khung giờ, thời lượng ({$slotDuration} phút) và số bệnh nhân tối đa ({$maxPatients} người/ca) cho Phòng khám #{$clinicId} thành công!");
        });
    }

    public function schedule(Request $request, $id) {
        $clinicId = $id;
        return view('auth.clinic.partials.clinic-schedule', compact(
            'clinicId'));
    }
}