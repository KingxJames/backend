<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new UserCollection(User::paginate());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'user deleted successfully'], 200);
    }

    public function getTotalUsers(User $user)
    {
        $user = User::count();
        return response()->json(['total' => $user]);
    }

    // public function userSearch(Request $request)
    // {
    //     // Validate input to ensure a search query is provided
    //     $request->validate([
    //         'query' => 'required|string|max:255',
    //     ]);

    //     // Retrieve the search query from the request
    //     $searchQuery = $request->input('query');

    //     // Search for users by name or email
    //     $users = User::where('name', 'LIKE', '%' . $searchQuery . '%')
    //         ->orWhere('email', 'LIKE', '%' . $searchQuery . '%')
    //         ->get();

    //     // Return the matching users as a JSON response
    //     return response()->json($users);
    // }

    public function loginOrCreate(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'picture' => 'required|url',
            'id_token' => 'required|string', // Validate the ID token
        ]);

        // Check if the user already exists
        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            // If the user does not exist, create a new one
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'picture' => $validated['picture'],
                'google_id_token' => $validated['id_token'], // Save the ID token
            ]);
        } else {
            // Update the ID token for existing user
            $user->update(['google_id_token' => $validated['id_token']]);


            // Return the user data
            return new UserResource($user);
        }
    }

    public function validateGoogleIdToken($idToken)
    {
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->get("https://oauth2.googleapis.com/tokeninfo?id_token={$idToken}");
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getUsers(Request $request)
    {
        // $idToken = $request->header('Authorization');
        // $idToken = str_replace('Bearer ', '', $idToken); // Remove 'Bearer ' prefix

        // $googleData = $this->validateGoogleIdToken($idToken);

        // if (!$googleData) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // // Proceed with fetching users if the token is valid
        // $users = User::all();
        // return response()->json(['users' => $users]);'
        try {
            // Retrieve the authenticated user via JWT token
            $user = JWTAuth::parseToken()->authenticate();

            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token is invalid or user not authenticated'], 401);
        }
    }
}