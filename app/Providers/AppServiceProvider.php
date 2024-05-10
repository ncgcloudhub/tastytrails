<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $siteSettings = SiteSetting::find(1);
            $view->with('siteSettings', $siteSettings);
        });

        View::composer('*', function ($view) {
            $isAdmin = auth()->check() && auth()->user()->role === 'admin';
            $view->with('isAdmin', $isAdmin);
        });
    }
}
