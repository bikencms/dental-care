<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNot('name', 'Administrator')->get();
        return view('auth.user', compact('users'));
    }
}
