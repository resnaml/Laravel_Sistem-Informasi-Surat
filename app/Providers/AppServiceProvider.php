<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Suratkeluar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;



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

        Gate::define('kepala', function(User $user) {
            return $user->is_kepala;
        });

        view()->share('jmlDiposisi', Suratkeluar::DisposisiKepala()->count());

        // Schema::defaultStringLength(191);
    }
}
