<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            // Specify the frontend URL for redirection after Google login
            return Socialite::driver('google')
                ->stateless() // Make sure to use stateless to prevent session issues
                ->with(['redirect_uri' => config('app.frontend_url') . '/auth/google/callback'])
                ->redirect();
        } catch (\Exception $e) {
            // Handle any errors during redirection
            return redirect(config('app.frontend_url') . '/login?error=' . urlencode($e->getMessage()));
        }
    }

    public function handleGoogleCallback()
    {
        try {
            // Retrieve the user from Google using stateless to prevent session issues
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if the user already exists in the database or create a new one
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()], // Match by email
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => Hash::make(uniqid()), // Use a unique hashed dummy password
                    'avatar' => $googleUser->getAvatar(), // Save user's Google avatar if needed
                ]
            );

            // Log in the user
            Auth::login($user);

            // Generate a token for API authentication (Optional)
            $token = $user->createToken('GoogleAuthToken')->plainTextToken;

            // Redirect to the frontend with token
            return redirect(config('app.frontend_url') . '/?token=' . $token);
        } catch (\Exception $e) {
            // If there’s an error, redirect to the login page with an error message
            return redirect(config('app.frontend_url') . '/login?error=' . urlencode($e->getMessage()));
        }
    }

 

    public function getUser()
    {
        // Get the currently authenticated user
        $user = Auth::user();
        
        // Check if a user is authenticated
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
}