<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MenuResource;
use App\Http\Resources\MenuCollection;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\Role;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MenuCollection(Menu::with('subMenus')->paginate());
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
    public function store(StoreMenuRequest $request)
    {
        return new MenuResource(Menu::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        // return new MenuResource($menu);
        $menu->load('subMenus');
        return new MenuResource($menu);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return response()->json(['message' => 'deleted successfully'], 200);
    }

    public function getMenus(Request $request)
    {
        // Check if role_id is provided in the request
        if (!$request->has('role_id')) {
            return response()->json(['error' => 'Role ID is required'], 400);
        }

        $roleId = $request->role_id; 
        $menus = $this->getMenusByRole($roleId);

        return response()->json($menus);
    }

    private function getMenusByRole($roleId)
    {
        // //$role receives a role and with(['menus.subMenus']) ensures menus and their submenus are loaded in a single query
        $role = Role::with(['menus.subMenus'])->find($roleId);

        if (!$role) {
            return [];
        }

        return $role->menus->map(function ($menu) {
            return [
                'id' => $menu->id,
                'icon' => $menu->icon,
                'name' => $menu->name,
                'path' => $menu->path,
                'subMenu' => $menu->subMenus->map(function ($subMenu) {
                    return [
                        'id' => $subMenu->id,
                        'icon' => $subMenu->icon,
                        'name' => $subMenu->name,
                        'path' => $subMenu->path,
                        'menuId' => $subMenu->menu_id,
                    ];
                }),
            ];
        });
    }
}
