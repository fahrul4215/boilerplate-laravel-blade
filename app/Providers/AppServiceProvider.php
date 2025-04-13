<?php

namespace App\Providers;

use App\Models\AppSetting;
use Cache;
use Dotenv\Dotenv;
use Illuminate\Support\ServiceProvider;
use View;

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
        // Check if we are in the production environment
        if (app()->environment('production')) {
            // Load the .env.prod file
            $dotenv = Dotenv::createImmutable(base_path(), '.env.prod');
            $dotenv->load();
        }

        $appSettings = Cache::rememberForever('app-settings', function () {
            return AppSetting::first();
        });

        config([
            'app.store_name' => $appSettings->store_name ?? '',
            'app.currency' => $appSettings->currency ?? '',
            'app.wa_number' => $appSettings->wa_number ?? '',
            'app.weight' => $appSettings->weight ?? '',
        ]);
        View::share('config', config('app'));
    }
}
