<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlineAppointment;

use App\Mail\OnlineAppointmentMail;
use App\Mail\AdminAppointmentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|max:20',
            'interest' => 'nullable|max:255',
            'briefly' => 'nullable',
            'status' => 'required',
            'language' => 'required|max:10',
        ]);

        $exists = OnlineAppointment::where('email', $request->email)
            ->where('status', '!=', 'finished')
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'You have a previous appointment that hasn\'t been completed yet. Please complete your current appointment before booking a new one.'
            ], 422);
        } else {

            $data['token'] = (string) Str::uuid();
            $appointment = OnlineAppointment::create($data);
            
            Mail::to([
                $data['email']
            ])
            ->locale($appointment->language)
            ->send(new OnlineAppointmentMail($appointment));

            Mail::to([
                'minhbiken14@gmail.com', 'support@vietnamdentalcare.vn', 'thy.nguyen85@proton.me'
            ])
            ->send(new AdminAppointmentMail($appointment));

            return response()->json([
                'success' => true,
                'message' => 'Submitted successfully.',
                'data' => $data,
            ], 201);
        }
    }
}
