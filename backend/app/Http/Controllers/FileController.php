<?php

namespace App\Http\Controllers;

use App\Http\Resources\FileResource;
use App\Models\File;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(request()->is('*students/*/profile-picture')) {
            $student = Student::findOrFail($id);
            if(empty($student->profilePictureId)) return new FileResource(null);
            $file = File::where('fileId', $student->profilePictureId)
                ->first();
            return new FileResource($file);
        } else if(request()->is('*file/*')) {
            $fileId = Crypt::decryptString($id);
            $file = File::findOrFail($fileId);
            return response($file->content)->withHeaders([
                'Content-Type' => $file->mimeType,
                'Content-Length' => strlen($file->content)
            ]);
        } else {
            Log::error('Request URL did not match: ' . request()->url());
            return response()->json([
                'code' => Response::HTTP_BAD_REQUEST,
                'message' => 'This endpoint does not exist.'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
