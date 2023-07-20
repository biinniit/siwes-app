<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchCollection;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $branches = Branch::where('companyId', $company->companyId)
            ->get();

        return new BranchCollection($branches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Company $company)
    {
        $request->merge(['companyId' => $company->companyId]);
        $branch = Branch::create($request->only([
            'companyId', 'name', 'address', 'phone'
        ]));

        return new BranchResource($branch);
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return new BranchResource($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $branch->update($request->only([
            'name', 'address', 'phone'
        ]));

        return new BranchResource($branch);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
