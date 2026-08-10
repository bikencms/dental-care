<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Service;
use App\Models\ClinicProcedure;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::withTrashed()->with('district')->paginate(10);
        return view('auth.clinic.clinic', compact('clinics'));
    }

    public function show($id)
    {
        $clinic = Clinic::with(['district', 'doctors', 'services', 'languages', 'tags', 'user'])->find($id);
        return view('auth.clinic.clinic-show', compact('clinic'));
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
        $user->clinic()->sync([$clinic->id]);

        return redirect()->back()->with('success', 'New clinic created successfully!');
    }

    public function storeService(Request $request, $clinicId)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'slug'           => 'required|string|max:255|unique:services,slug',
            'category'       => 'required|nullable|string|max:255',
            'starting_price' => 'required|nullable|numeric|min:0',
            'unit'           => 'required|nullable|string|max:100',
        ]);

        // 1. Tạo Service
        $service = Service::create([
            'name'     => $validated['name'],
            'slug'     => $validated['slug'],
            'category' => $validated['category'],
        ]);

        // 2. Gán vào bảng trung gian ClinicService
        $clinic = Clinic::findOrFail($clinicId);
        $clinic->services()->attach($service->id, [
            'starting_price' => $validated['starting_price'] ?? null,
            'unit'           => $validated['unit'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Service added successfully!');
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
}
