<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OnlineAppointment;

class UserController extends Controller
{
    public function index()
    {
        $users = OnlineAppointment::all();
        return view('auth.user', compact('users'));
    }
}
