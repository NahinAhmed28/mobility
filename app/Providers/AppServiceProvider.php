<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('public.*', function ($view) {
            $view->with('company', \Illuminate\Support\Facades\Cache::remember('company_profile', 3600, fn() => \App\Models\CompanyProfile::first()));
            $view->with('contact', \Illuminate\Support\Facades\Cache::remember('contact_settings', 3600, fn() => \App\Models\ContactSetting::first()));
        });
    }
}
