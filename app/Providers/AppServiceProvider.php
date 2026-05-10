<?php

namespace App\Providers;

use App\Services\{MatchingService, NotificationService, TransportCalculatorService};
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(NotificationService::class);
        $this->app->singleton(TransportCalculatorService::class);
        $this->app->singleton(MatchingService::class);
    }

    public function boot(): void
    {
        // Register role middleware alias
        $this->app['router']->aliasMiddleware(
            'role',
            \App\Http\Middleware\RoleMiddleware::class
        );

        // Share unread notification count globally
        view()->composer('*', function ($view) {
            if (auth()->check()) {
                $count = app(NotificationService::class)
                    ->unreadCount(auth()->id());
                $view->with('unreadNotifCount', $count);
            }
        });
    }
}
