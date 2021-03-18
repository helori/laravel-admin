<?php

namespace Helori\LaravelAdmin;

use Illuminate\Support\ServiceProvider;


class AdminServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }
    
    public function boot()
	{
        $this->loadRoutesFrom(__DIR__.'/Routes/routes.php');
        //$this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadViewsFrom(__DIR__.'/Views', 'laravel-admin');

        $this->publishes([
            __DIR__.'/Assets/admin.js' => resource_path('assets/js/admin.js'),
            __DIR__.'/Assets/admin.scss' => resource_path('assets/sass/admin.scss'),
        ], 'laravel-admin-assets');

        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/laravel-admin'),
        ], 'laravel-admin-views');
	}
}
