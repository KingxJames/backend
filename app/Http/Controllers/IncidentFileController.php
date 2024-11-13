<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncidentFileResource;
use App\Http\Resources\IncidentFileCollection;
use App\Http\Requests\StoreIncidentFileRequest;
use App\Http\Requests\UpdateIncidentFileRequest;
use App\Models\IncidentFile;

class IncidentFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new IncidentFileCollection(IncidentFile::paginate());
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
    public function store(StoreIncidentFileRequest $request)
    {
        return new IncidentFileResource(IncidentFile::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(IncidentFile $incidentFile)
    {
        return new IncidentFileResource($incidentFile);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncidentFile $incidentFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncidentFileRequest $request, IncidentFile $incidentFile)
    {
        $incidentFile->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncidentFile $incidentFile)
    {
        $incidentFile->delete();
        return response()->json(['message' => 'incidentFile deleted successfully'], 200);
    }

    public function getTotalIncidentFile(IncidentFile $incidentFile)
    {
        $incidentFile = IncidentFile::count();
        return response()->json(['total' => $incidentFile]);
    }

}
