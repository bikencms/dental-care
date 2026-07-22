<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $contact = User::create(
            [
                'name'      => $request->name,
                'username'     => $request->email,
                'email'     => $request->email,
                'password'  => Hash::make('password123'),
                'phone'     => $request->phone,
                'interest'  => $request->interest,
                'briefly'   => $request->briefly,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Submitted successfully.',
            'data' => $contact,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
