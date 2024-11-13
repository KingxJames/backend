<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuRoleResource;
use App\Http\Resources\MenuRoleCollection;
use App\Http\Requests\StoreMenuRoleRequest;
use App\Http\Requests\UpdateMenuRoleRequest;
use App\Models\MenuRole;

class MenuRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MenuRoleCollection(MenuRole::paginate());
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
    public function store(StoreMenuRoleRequest $request)
    {
        return new MenuRoleResource(MenuRole::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(MenuRole $menuRole)
    {
        return new MenuRoleResource($menuRole);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuRole $menuRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRoleRequest $request, MenuRole $menuRole)
    {
        $menuRole->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuRole $menuRole)
    {
        $menuRole->delete();
        return response()->json(['message' => 'deleted successfully'], 200);
    }
}
