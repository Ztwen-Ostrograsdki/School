<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
           // App\Models\Classe::class => App\Policies\ClassePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAccepted', function($user){
            return true;
        });

        Gate::define('gateIsAdmin', function(){
            $user = auth()->user();
            $roles = $user->getRoles();
            return in_array('admin', $roles) || in_array('superAdmin', $roles);
        });
        Gate::define('onlyThisTeacher', function($user, $teacher){
            return auth()->user()->teachers->toArray()!== [] && auth()->user()->teacher()->id === $teacher->id;
        });

        Gate::define('errors', function(){
            return false;
        });
    }
}
