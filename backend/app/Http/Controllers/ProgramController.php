<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgramCollection;
use App\Http\Resources\ProgramResource;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();

        return new ProgramCollection($programs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $program = Program::create($request->only(['title']));

        return new ProgramResource($program);
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return new ProgramResource($program);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $program->update($request->only(['title']));

        return new ProgramResource($program);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
