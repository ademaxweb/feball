<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//
        Gate::before(function (User $user){

            if ($user->roles->contains(Role::query()->find(4))) {
                return true;
            }
        });

        foreach (Permission::all() as $permission)
        {
            Gate::define($permission->name, function (?User $user) use ($permission) {
                if ($permission->name == "CAN_VIEW_STATS" && !$user) return true;
                if (!$user) return  false;
                return $user->hasPermission($permission);
            });
        }
    }
}
