<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncidentTypeResource;
use App\Http\Resources\IncidentTypeCollection;
use App\Http\Requests\StoreIncidentTypeRequest;
use App\Http\Requests\UpdateIncidentTypeRequest;
use App\Models\IncidentType;

class IncidentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new IncidentTypeCollection(IncidentType::paginate());
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
    public function store(StoreIncidentTypeRequest $request)
    {
        return new IncidentTypeResource(IncidentType::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(IncidentType $incidentType)
    {
        return new IncidentTypeResource($incidentType);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncidentType $incidentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncidentTypeRequest $request, IncidentType $incidentType)
    {
        $incidentType->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncidentType $incidentType)
    {
        $incidentType->delete();
        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
