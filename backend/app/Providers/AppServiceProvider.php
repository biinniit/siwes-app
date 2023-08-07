<?php

namespace App\Providers;

use App\Helpers\Sha256Hasher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // because I'm not using API tokens... yet
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // use SHA-256 instead of Laravel's bcrypt
        Hash::extend('sha256', static function() {
            return new Sha256Hasher();
        });
    }
}
