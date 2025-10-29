<?php

namespace App\Providers;

use App\Services\Calendar\CalendarProviderManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CalendarProviderManager::class, function ($app) {
            return new CalendarProviderManager(
                $app,
                $app['config']->get('calendar.providers', [])
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
