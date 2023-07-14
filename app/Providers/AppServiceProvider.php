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
        // locale değiştirme işlemi
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        }

    }
}
