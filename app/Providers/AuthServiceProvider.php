<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Building;
use App\Models\Residence;
use App\Models\Information;


class AuthServiceProvider extends ServiceProvider
{
    const ADMIN_ROLE = 5;
    const USER_ROLE = 10;
    
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->category == self::ADMIN_ROLE;
        });
    
        Gate::define('user', function ($user) {
            return $user->category == self::USER_ROLE;
        });
    }
}
