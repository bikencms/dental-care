<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Clinic;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::with('district')->paginate(10);
        return view('auth.clinic', compact('clinics'));
    }

    public function show($id)
    {
        $clinic = Clinic::with(['district', 'doctors', 'services', 'languages', 'tags'])->find($id);
        return view('auth.clinic-show', compact('clinic'));
    }
}
