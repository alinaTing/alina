<?php

namespace App\Providers;

use Encore\Admin\Config\Config;
use Illuminate\Support\ServiceProvider;
use Studio\Totem\Totem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Totem::auth(function($request) {
            return true;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Config::load();  // Add this
    }
}
