<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncidentStatusResource;
use App\Http\Resources\IncidentStatusCollection;
use App\Http\Requests\StoreIncidentStatusRequest;
use App\Http\Requests\UpdateIncidentStatusRequest;
use App\Models\IncidentStatus;

class IncidentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new IncidentStatusCollection(IncidentStatus::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncidentStatusRequest $request)
    {
        return new IncidentStatusResource(IncidentStatus::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(IncidentStatus $incidentStatus)
    {
        return new IncidentStatusResource($incidentStatus);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncidentStatus $incidentStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncidentStatusRequest $request, IncidentStatus $incidentStatus)
    {
        $incidentStatus->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncidentStatus $incidentStatus)
    {
        $incidentStatus->delete();
        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
