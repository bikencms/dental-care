<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\ClinicUser;
use App\Models\Service;
use App\Models\ClinicProcedure;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ClinicSchedule;
use Carbon\Carbon;
class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::withTrashed()->with('district')->paginate(10);
        return view('auth.clinic.clinic', compact('clinics'));
    }

    public function show($id)
    {
        $clinic = Clinic::with(['district', 'doctors', 'languages', 'tags', 'user'])->find($id);
        $services = Service::all();

        // 1. Lấy toàn bộ lịch active của phòng khám (cả implant và veneers)
        $allSchedules = ClinicSchedule::where('clinic_id', $id)
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

        return view('auth.clinic.clinic-show', 
        compact('clinic', 'services', 'existingSchedules',
            'clinicId', 
            'schedules', 
            'currentMonth', 
            'nextMonth',
            'currentDuration',
            'currentMaxPatients',
            'currentServiceType'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'slug'         => 'required|string|max:255|unique:clinics,slug',
            'city'         => 'required|string|max:255',
            'district'     => 'required|string|max:255',
            'address'      => 'required|string|max:255',
            'image'        => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description'  => 'required|string',
            'rating'       => 'nullable|numeric|between:1,5',
            'review_count' => 'nullable|integer|min:0',
        ]);

        // Xử lý upload ảnh vào storage/app/public/clinics
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('clinics', 'public');
            $validated['image'] = $path;
        }

        // Tạo tên ngẫu nhiên
        $randomName = fake()->name();
        // Tạo username ngẫu nhiên từ tên (viết liền không dấu + số ngẫu nhiên)
        $randomUsername = Str::slug($randomName, '') . rand(10, 99);
        $plainPassword = Str::password(length: 16, letters: true, numbers: true, symbols: true, spaces: false);

        $user = User::create([
            'name'     => $randomName,
            'username' => $randomUsername,
            'email'    => fake()->unique()->safeEmail(),
            'phone'    => '09' . fake()->numerify('########'),
            'password'       => Hash::make($plainPassword),
            'plain_password' => $plainPassword, // Lưu thẳng plain text
        ]);

        // Gán role User (Spatie)
        $user->assignRole('User');

        $validated['is_published'] = false;
        $clinic = Clinic::create($validated);

        ClinicUser::create([
            'clinic_id'     => $clinic->id,
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'New clinic created successfully!');
    }

    public function storeProcedure(Request $request, $clinicId)
    {
        $validated = $request->validate([
            'service_id'         => 'required|exists:services,id',
            'procedure_name'     => 'required|string|max:255',
            'procedure_price'    => 'nullable|numeric|min:0',
            'procedure_duration' => 'nullable|string|max:100',
        ]);

        ClinicProcedure::create([
            'clinic_id'          => $clinicId,
            'service_id'         => $validated['service_id'],
            'procedure_name'     => $validated['procedure_name'],
            'procedure_price'    => $validated['procedure_price'] ?? null,
            'procedure_duration' => $validated['procedure_duration'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Procedure added successfully!');
    }

    public function storeDoctor(Request $request, $clinicId)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'title'  => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('doctors', 'public');
        }

        Doctor::create([
            'clinic_id'          => $clinicId,
            'name'               => $validated['name'],
            'title'              => $validated['title'] ?? 'Specialist',
            'avatar'             => $avatarPath,
            'is_expert_10_years' => $request->boolean('is_expert_10_years'),
            'has_high_degree'    => $request->boolean('has_high_degree'),
            'has_studied_abroad' => $request->boolean('has_studied_abroad'),
        ]);

        return redirect()->back()->with('success', 'Doctor added successfully!');
    }

    // Toggle hoặc bật trạng thái Public
    public function publish($id)
    {
        $clinic = Clinic::findOrFail($id);

        // Kiểm tra xem phòng khám đã cấu hình lịch khám (clinic_schedules) chưa
        if (!$clinic->schedules()->exists()) {
            return redirect()->back()->with('error', 'Không thể xuất bản! Phòng khám chưa được thiết lập lịch khám.');
        }

        $clinic->update(['is_published' => true]);

        return redirect()->back()->with('success', 'Đã xuất bản (Public) phòng khám thành công!');
    }

    // Chuyển lại thành bản nháp (Unpublish)
    public function unpublish($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->update(['is_published' => false]);

        return redirect()->back()->with('success', 'Đã chuyển phòng khám về dạng bản nháp!');
    }

    public function bookingAppointment($clinicId) {
        return view('auth.clinic.clinic-appointment', compact('clinicId'));
    }
}
