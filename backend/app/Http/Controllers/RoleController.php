<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Branch;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Branch $branch)
    {
        $roles = Role::where('branchId', $branch->branchId)
            ->get();
        $roles->map(function ($role) use ($branch) {
            $role->remuneration = +$role->remuneration;
            $role->companyId = $branch->companyId;
            return $role;
        });

        return new RoleCollection($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Branch $branch)
    {
        $request->merge(['branchId' => $branch->branchId]);
        $role = Role::create($request->only([
            'branchId', 'title', 'remuneration', 'remunerationCycle', 'slots'
        ]));

        return new RoleResource($role);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
