<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Branch $branch, Company $company)
    {
        $roles = isset($branch->branchId)
            ? Role::where('branchId', $branch->branchId)
                ->get()
            : Role::whereIn('branchId', Branch::select(['branchId'])
                    ->where('companyId', $company->companyId))
                ->get();

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
        $role->update($request->only([
            'title', 'remuneration', 'remunerationCycle', 'slots'
        ]));

        return new RoleResource($role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
