<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCampusResource;
use App\Http\Resources\UserCampusCollection;
use App\Http\Requests\StoreUserCampusRequest;
use App\Http\Requests\UpdateUserCampusRequest;
use App\Models\UserCampus;

class UserCampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new UserCampusCollection(UserCampus::paginate());
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
    public function store(StoreUserCampusRequest $request)
    {
        return new UserCampusResource(UserCampus::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(UserCampus $userCampus)
    {
        return new UserCampusResource($userCampus);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserCampus $userCampus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserCampusRequest $request, UserCampus $userCampus)
    {
        $userCampus->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserCampus $userCampus)
    {
        $userCampus->delete();
        return response()->json(['message' => 'userCampus deleted successfully'], 200);
    }
}
