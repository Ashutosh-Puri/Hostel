<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(ChannelManager $notificationManager)
    {
        $notificationManager->extend('vonage', function ($app) {
            return $app->make(\App\Notifications\Channels\SmsChannel::class);
        });
    }
}
