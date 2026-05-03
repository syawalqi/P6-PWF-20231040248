<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('manage-product', function (\App\Models\User $user) {
            return $user->role === 'admin';
        });

        Gate::define('export-product', function (\App\Models\User $user) {
            return $user->role === 'admin';
        });

        Gate::define('manage-category', function (\App\Models\User $user) {
            return $user->role === 'admin';
        });
    }
}
