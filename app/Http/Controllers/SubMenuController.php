<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubMenuCollection;
use App\Http\Resources\SubMenuResource;
use App\Http\Requests\StoreSubMenuRequest;
use App\Http\Requests\UpdateSubMenuRequest;
use App\Models\SubMenu;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new SubMenuCollection(SubMenu::paginate());
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
    public function store(StoreSubMenuRequest $request)
    {
        return new SubMenuResource(SubMenu::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(SubMenu $subMenu)
    {
        return new SubMenuResource($subMenu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubMenu $subMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubMenuRequest $request, SubMenu $subMenu)
    {
        $subMenu->update($request->all());
        return response()->json(['message' => 'SubMenu updated successfully', 'data' => $subMenu], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubMenu $subMenu)
    {
        $subMenu->delete();
        return response()->json(['message' => 'submenu deleted successfully'], 200);
    }
}
