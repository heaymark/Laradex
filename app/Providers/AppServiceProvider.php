<?php

namespace Laradex\Providers;

use Illuminate\Support\Facades\Schema; //Se agrega por el error al realizar la migracion
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);//Se agrega por el error al realizar la migracion
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
