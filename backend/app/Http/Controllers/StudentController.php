<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
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
        $firstName = $request->input('firstName');
        $middleName = $request->input('middleName');
        $middleName = empty($middleName) ? 'NULL' : "'" . $middleName . "'";
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $passwordHash = hash('sha256', $request->input('password'));
        $phone = $request->input('phone') ?? 'NULL';
        $programId = $request->input('programId') ?? 'NULL';
        $address = $request->input('address');
        $address = empty($address) ? 'NULL' : "'" . $address . "'";
        $profilePictureId = $request->input('profilePictureId') ?? 'null';
        $resumeId = $request->input('resumeId') ?? 'null';
        DB::unprepared("INSERT INTO student
            (firstName, middleName, lastName, email, passwordHash, phone, programId, address, profilePictureId, resumeId)
            VALUES ('$firstName', " . $middleName . ", '$lastName', '$email', BINARY X'$passwordHash', $phone, $programId, " . $address . ", $profilePictureId, $resumeId)");

        $student = Student::where('email', $email)
            ->get()
            ->first();

        return new StudentResource($student);
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
