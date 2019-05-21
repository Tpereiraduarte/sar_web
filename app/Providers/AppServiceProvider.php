<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\View;
=======
use Illuminate\Support\Facades\Schema;

>>>>>>> feature_perfil

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
<<<<<<< HEAD
        View::share('theme','lte'); 
=======
        Schema::defaultStringLength(191);
>>>>>>> feature_perfil
    }
}
