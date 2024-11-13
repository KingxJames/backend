<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncidentReportResource;
use App\Http\Resources\IncidentReportCollection;
use App\Http\Requests\StoreIncidentReportRequest;
use App\Http\Requests\UpdateIncidentReportRequest;
use App\Models\IncidentReport;
use Database\Factories\IncidentReportFactory;

class IncidentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new IncidentReportCollection(IncidentReport::paginate());
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
    public function store(StoreIncidentReportRequest $request)
    {
        return new IncidentReportResource(IncidentReport::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(IncidentReport $incidentReport)
    {
        return new IncidentReportResource($incidentReport);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncidentReport $incidentReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncidentReportRequest $request, IncidentReport $incidentReport)
    {
        $incidentReport->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncidentReport $incidentReport)
    {
        $incidentReport->delete();
        return response()->json(['message' => 'incidentReport deleted successfully'], 200);
    }

    public function getTotalIncidentReport(IncidentReport $incidentReport)
    {
        $incidentReport = IncidentReport::count();
        return response()->json(['total' => $incidentReport], 200);
    }

}