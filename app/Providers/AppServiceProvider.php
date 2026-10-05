<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        Blade::if('customerAuth', function () {
            return Auth::guard('customer')->check();
        });

        // Lazy load: query sirf view render hone pe chalegi, build ke time nahi
        View::composer('*', function ($view) {
            static $settings = false;

            if ($settings === false) {
                try {
                    $settings = Schema::hasTable('website_settings')
                        ? WebsiteSetting::first()
                        : null;
                } catch (\Throwable $e) {
                    $settings = null;
                }
            }

            $view->with('websiteSettings', $settings);
        });
    }
}