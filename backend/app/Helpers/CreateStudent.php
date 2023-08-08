<?php

namespace App\Helpers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait CreateStudent
{
    public function createStudent(Request $request)
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
}
