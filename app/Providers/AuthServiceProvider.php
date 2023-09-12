<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // create a gate as accessAdministration
        Gate::define('accessAdministration', function () {
            return auth()->check() && (auth()->user()->role_id->value === 1 || auth()->user()->role_id->value === 2);
        });
    }
}
