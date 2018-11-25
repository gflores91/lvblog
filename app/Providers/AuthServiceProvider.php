<?php

namespace lvblog\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use lvblog\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'lvblog\Model' => 'lvblog\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('dms', function(User $user, User $otheruser){
            return
                    $user->isFollowing($otheruser) &&
                    $otheruser->isFollowing($user);
        });
    }
}
