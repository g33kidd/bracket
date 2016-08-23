<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Permissions for API routes
        Passport::tokensCan([
            'admin' => 'Allows access to all API endpoints and actions.',
            'users' => 'Allows read access to users and access to own user account.',
            'posts' => 'Allows access to publish and read posts.',
            'tournaments' => 'Allows read access to tournaments.',
            'teams' => 'Allows read access to teams and write access to own account.',
            'user' => 'Allows read/write access to own account and read access to most API endpoints.'
        ]);

        Passport::routes();
    }
}
