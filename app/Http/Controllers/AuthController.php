<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $fields = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Attempt to find the user with the provided name
        $user = User::where('name', $fields['name'])->first();

        // Check if the user exists and the password is correct
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'success' => false,
                'message' => 'The provided credentials are incorrect.',
            ], 401);
        }

        // Generate a token for the authenticated user
        $token = $user->createToken('AuthToken')->plainTextToken;

        // Return a successful response with the token
        return response([
            'success' => true,
            'message' => 'Authenticated successfully.',
            'data' => [
                'token' => $token,
            ],
        ], 200);
    }

    public function logout(Request $request)
    {
        // Revoke all tokens for the authenticated user
        $request->user()->tokens()->delete();

        return response([
            'success' => true,
            'message' => 'Logged out successfully.',
        ], 200);
    }
}
