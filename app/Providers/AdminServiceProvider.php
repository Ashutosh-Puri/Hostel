<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */

    //  public function boot(): void
    // {
    //     Auth::guard('admin')->providers('admins', function ($app, array $config) {
    //         // Replace 'App\Models\Admin' with the actual model for admin authentication
    //         return new \Illuminate\Auth\EloquentUserProvider($app['hash'], 'App\Models\Admin');
    //     });
    // }
    // public function boot(): void
    // {
      

    //     Auth::guard('admin')->providers('admins', function ($app, array $config) {
    //         // Replace 'App\Models\Admin' with the actual model for admin authentication
    //         return new \Illuminate\Auth\EloquentUserProvider($app['hash'], 'App\Models\Admin');
    //     });
    // }

    public function boot(): void
    {
        Auth::extend('admin', function ($app, $name, array $config) {
            // Replace 'App\Models\Admin' with the actual model for admin authentication
            return new \Illuminate\Auth\SessionGuard($name, $app['session.store'], $app['auth']->createUserProvider($config['provider']));
        });

        Auth::provider('admins', function ($app, array $config) {
            // Replace 'App\Models\Admin' with the actual model for admin authentication
            return new \Illuminate\Auth\EloquentUserProvider($app['hash'], 'App\Models\Admin');
        });
    }
}
