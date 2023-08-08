<?php

namespace App\Http\Controllers;

use App\Helpers\CreateStudent;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    use CreateStudent;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        
        return new StudentCollection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->createStudent($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // TODO: implement reset password functionality
        $student->update([
            'firstName' => $request->input('firstName') ?? $student->firstName,
            'middleName' => $request->has('middleName') ? $request->input('middleName') : $student->middleName,
            'lastName' => $request->input('lastName') ?? $student->lastName,
            'email' => $request->input('email') ?? $student->email,
            'phone' => $request->has('phone') ? $request->input('phone') : $student->phone,
            'programId' => $request->has('programId') ? $request->input('programId') : $student->programId,
            'address' => $request->has('address') ? $request->input('address') : $student->address
        ]);

        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
