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
            Passport::routes();

            Gate::define('showMune',function($user){
                    if($user->role =="admin"){
                        return true;
                    }else{
                        return false;
                    }
            });


            Gate::define('showButton',function($user){
                if($user->role =="writer"){
                    return false;
                }else{
                    return true;
                }
        });

    //     Gate::define('showMessage',function($user){
    //         if($user->role =="admin"){
    //             return true;
    //         }else{
    //             return false;
    //         }
    // });

        //
    }
}
