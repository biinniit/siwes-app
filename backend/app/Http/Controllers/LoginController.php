<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyUserResource;
use App\Http\Resources\StudentResource;
use App\Models\CompanyUser;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {
        Log::debug('LoginController is called');

        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:6']
        ]);

        if(Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            $student = Student::where('email', $credentials['email'])
                ->get()
                ->first();

            return new StudentResource($student);
        }
        else if(Auth::guard('company_user')->attempt($credentials)) {
            $request->session()->regenerate();
            $companyUser = CompanyUser::where('email', $credentials['email'])
                ->get()
                ->first();

            return new CompanyUserResource($companyUser);
        }

        Log::error('Login credentials for {email} did not match', $credentials);
        return response()->json([
            'code' => Response::HTTP_UNAUTHORIZED,
            'message' => 'The provided credentials do not match our records.'
        ], Response::HTTP_UNAUTHORIZED);
    }
}
