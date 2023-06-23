<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin', function(User $user) {
            return $user->is_admin;
        });

        // Gate::define('kepala', function(User $user) {
        //     return $user->is_kepala;
        // });


        // Schema::defaultStringLength(191);
    }
}
