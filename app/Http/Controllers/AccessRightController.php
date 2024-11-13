<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccessRightResource;
use App\Http\Resources\AccessRightCollection;
use App\Http\Requests\StoreAccessRightRequest;
use App\Http\Requests\UpdateAccessRightRequest;
use App\Models\AccessRight;

class AccessRightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AccessRightCollection(AccessRight::paginate());

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
    public function store(StoreAccessRightRequest $request)
    {
        return new AccessRightResource(AccessRight::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(AccessRight $accessRight)
    {
        return new AccessRightResource($accessRight);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccessRight $accessRight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccessRightRequest $request, AccessRight $accessRight)
    {
        $accessRight->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessRight $accessRight)
    {
        $accessRight->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
