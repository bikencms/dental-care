<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyClinicController extends Controller
{
    /**
     * 1. Lấy thông tin Clinic duy nhất của User đang log in
     */
    private function getClinic()
    {
        $clinic = auth()->user()->clinics()->first();

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
        return view('auth.user.clinic-index', compact('clinic'));
    }

    /**
     * Form chỉnh sửa phòng khám
     */
    public function edit()
    {
        $clinic = $this->getClinic();
        return view('auth.user.clinic-index', compact('clinic'));
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
}