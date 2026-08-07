<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Service;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::with('district')->paginate(10);
        return view('auth.clinic.clinic', compact('clinics'));
    }

    public function show($id)
    {
        $clinic = Clinic::with(['district', 'doctors', 'services', 'languages', 'tags'])->find($id);
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

        Clinic::create($validated);

        return redirect()->back()->with('success', 'New clinic created successfully!');
    }

    public function storeService(Request $request, $clinicId)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'slug'           => 'required|string|max:255|unique:services,slug',
            'category'       => 'nullable|string|max:255',
            'starting_price' => 'nullable|numeric|min:0',
            'unit'           => 'nullable|string|max:100',
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
}
