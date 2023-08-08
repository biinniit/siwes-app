<?php

namespace App\Http\Controllers;

use App\Helpers\CreateStudent;
use App\Http\Resources\CompanyUserResource;
use App\Http\Resources\StudentResource;
use App\Models\CompanyUser;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    use CreateStudent;

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {
        Log::debug('AuthController is called');

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

    /**
     * Sign a student up.
     */
    public function signUp(Request $request)
    {
        $this->createStudent($request);
        return $this->authenticate($request);
    }

    /**
     * Get currently authenticated user.
     */
    public function getUser()
    {
        $user = Auth::user();
        if($user->getAuthIdentifierName() === App::make('Student')->getKeyName()) {
            return new StudentResource($user);
        } else if($user->getAuthIdentifierName() === App::make('CompanyUser')->getKeyName()) {
            return new CompanyUserResource($user);
        }

        Log::error('Currently authenticated user not found');
        return response()->json([
            'code' => Response::HTTP_NOT_FOUND,
            'message' => 'Currently authenticated user not found.'
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::debug('AuthController::logout called');
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
