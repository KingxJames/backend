<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentMemberResource;
use App\Http\Resources\DepartmentMemberCollection;
use App\Http\Requests\StoreDepartmentMemberRequest;
use App\Http\Requests\UpdateDepartmentMemberRequest;
use App\Models\DepartmentMember;

class DepartmentMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new DepartmentMemberCollection( DepartmentMember::paginate());
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
    public function store(StoreDepartmentMemberRequest $request)
    {
        return new DepartmentMemberResource(DepartmentMember::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(DepartmentMember $departmentMember)
    {
        return new DepartmentMemberResource($departmentMember);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DepartmentMember $departmentMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentMemberRequest $request, DepartmentMember $departmentMember)
    {
        $departmentMember->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DepartmentMember $departmentMember)
    {
        $departmentMember->delete();
        return response()->json(['message' => 'building deleted successfully'], 200);
    }
}
