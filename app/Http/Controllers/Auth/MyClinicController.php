<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClinicSchedule;
use Carbon\Carbon;
use App\Models\Service;
class MyClinicController extends Controller
{
    /**
     * 1. Lấy thông tin Clinic duy nhất của User đang log in
     */
    private function getClinic()
    {
        $clinic = auth()->user()->clinic()->first();

        if (!$clinic) {
            abort(444, 'Tài khoản của bạn chưa được gán phòng khám nào.');
        }

        return $clinic;
    }

    /**
     * Xem thông tin phòng khám
     */
    public function index()
    {
        $clinic = $this->getClinic();

        $services = Service::all();

        // 1. Lấy toàn bộ lịch active của phòng khám (cả implant và veneers)
        $allSchedules = ClinicSchedule::where('clinic_id', $clinic->id)
            ->where('is_active', 1)
            ->orderBy('service_type')
            ->orderBy('day_of_week')
            ->orderBy('start_time')
            ->get();

        // Mảng chứa dữ liệu gom nhóm theo service_type
        $existingSchedules = [
            'implant' => [],
            'veneers' => [],
        ];

        // 2. Nhóm theo service_type
        $groupedByService = $allSchedules->groupBy('service_type');

        foreach (['implant', 'veneers'] as $service) {
            if (!$groupedByService->has($service)) {
                continue;
            }

            $groupedByDay = $groupedByService[$service]->groupBy('day_of_week');

            foreach ($groupedByDay as $dayOfWeek => $slots) {
                $currentStart = null;
                $currentEnd = null;

                foreach ($slots as $slot) {
                    $slotStart = Carbon::parse($slot->start_time)->format('H:i');
                    $slotEnd = Carbon::parse($slot->end_time)->format('H:i');

                    if ($currentStart === null) {
                        $currentStart = $slotStart;
                        $currentEnd = $slotEnd;
                    } else {
                        // Nếu slot nối tiếp liên tục
                        if ($slotStart === $currentEnd) {
                            $currentEnd = $slotEnd;
                        } else {
                            // Bị ngắt quãng -> lưu khoảng cũ, tạo khoảng mới
                            $existingSchedules[$service][] = [
                                'day_of_week' => (int) $dayOfWeek,
                                'start_time'  => $currentStart,
                                'end_time'    => $currentEnd,
                            ];
                            $currentStart = $slotStart;
                            $currentEnd = $slotEnd;
                        }
                    }
                }

                // Lưu khoảng cuối cùng trong ngày
                if ($currentStart !== null) {
                    $existingSchedules[$service][] = [
                        'day_of_week' => (int) $dayOfWeek,
                        'start_time'  => $currentStart,
                        'end_time'    => $currentEnd,
                    ];
                }
            }
        }


        $clinicId = $clinic->id;

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

        return view('auth.clinic.clinic-show', compact('clinic', 'services', 'existingSchedules',
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
     * Form chỉnh sửa phòng khám
     */
    public function edit()
    {
        $clinic = $this->getClinic();
        return view('auth.clinic.clinic-show', compact('clinic'));
    }

    /**
     * Cập nhật thông tin phòng khám
     */
    public function update(Request $request)
    {
        $clinic = $this->getClinic();

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'city'        => 'required|string|max:100',
            'district'    => 'required|string|max:100',
            'address'     => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('clinics', 'public');
        }

        $clinic->update($validated);

        return redirect()->route('my-clinic.index')->with('success', 'Cập nhật thông tin phòng khám thành công!');
    }

    /**
     * Xóa phòng khám
     */
    public function destroy()
    {
        $clinic = $this->getClinic();
        $clinic->delete();

        return redirect()->route('dashboard.user.clinic.index')->with('success', 'Đã xóa phòng khám!');
    }

    public function preview() {
        $clinic = $this->getClinic();
        $appointment = [];
        return view('clinics.show', compact('clinic', 'appointment'));
    }
}