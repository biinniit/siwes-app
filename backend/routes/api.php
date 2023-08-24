<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function() {
    Route::controller(AuthController::class)->group(function() {
        Route::post('/login', 'authenticate');
        Route::post('/sign-up', 'signUp');
        Route::get('/user', 'getUser')->middleware('auth');
        Route::get('/logout', 'logout')->middleware('auth');
    });
});

Route::controller(FileController::class)->group(function() {
    Route::prefix('companies')->group(function() {
        Route::post('/{company}/logo', 'store')->withoutScopedBindings();
        Route::get('/{company}/logo', 'show')->withoutScopedBindings();
        Route::put('/{company}/logo', 'update')->withoutScopedBindings();
        Route::delete('/{company}/logo', 'destroy')->withoutScopedBindings();
    
        Route::get('/{company}/images', 'index')->withoutScopedBindings();
        Route::post('/{company}/images', 'store')->withoutScopedBindings();
        Route::get('/images/{image}', 'show')->withoutScopedBindings();
        Route::put('/images/{image}', 'update')->withoutScopedBindings();
        Route::delete('/images/{image}', 'destroy')->withoutScopedBindings();
    });

    Route::prefix('students')->group(function() {
        Route::post('/{student}/profile-picture', 'store')->withoutScopedBindings();
        Route::get('/{student}/profile-picture', 'show')->withoutScopedBindings();
        Route::put('/{student}/profile-picture', 'update')->withoutScopedBindings();
        Route::delete('/{student}/profile-picture', 'destroy')->withoutScopedBindings();
    
        Route::post('/{student}/resume', 'store')->withoutScopedBindings();
        Route::get('/{student}/resume', 'show')->withoutScopedBindings();
        Route::put('/{student}/resume', 'update')->withoutScopedBindings();
        Route::delete('/{student}/resume', 'destroy')->withoutScopedBindings();
    });

    Route::get('/file/{file}', 'show')->withoutScopedBindings();
});

Route::apiResources([
    'companies' => CompanyController::class,
    'tags' => TagController::class,
    'programs' => ProgramController::class,
    'students' => StudentController::class
]);

Route::resource('companies.branches', BranchController::class)
    ->only(['index', 'store'])
    ->parameters(['companies' => 'company']);

Route::prefix('companies')->group(function() {
    Route::resource('/branches', BranchController::class)->only(['show', 'update', 'destroy']);

    Route::resource('/branches.roles', RoleController::class)
        ->only(['index', 'store'])
        ->parameters(['branches' => 'branch']);

    Route::resource('/branches/roles', RoleController::class)->only(['show', 'update', 'destroy']);
    Route::get('/{company}/roles', [RoleController::class, 'index'])->withoutScopedBindings();
});
