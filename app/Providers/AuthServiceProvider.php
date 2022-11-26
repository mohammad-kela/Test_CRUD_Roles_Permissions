<?php

namespace App\Providers;

// use Illuminate\Auth\Access\Gate;
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
        Gate::define('isAdmin', function($user){
           foreach($user->roles as $key=>$val);
            return $val->name == 'Admin';
        });
        Gate::define('isEditor', function($user){
            foreach($user->roles as $key=>$val);
             return $val->name == 'Editor';
         });
        Gate::define('isReader', function($user){
           foreach($user->roles as $key=>$val);
            return $val->name == 'Reader';
        });
        
    }
}
