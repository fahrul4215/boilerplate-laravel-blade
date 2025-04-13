<?php

namespace App\Http\Controllers;
use App\Models\AppSetting;
use Cache;
use Config;
use View;

abstract class Controller
{
    public function __construct()
    {
        $appSettings = Cache::rememberForever('app-settings', function () {
            return AppSetting::first();
        });

        config([
            'app.store_name' => $appSettings->store_name ?? '',
            'app.currency' => $appSettings->currency ?? '',
            'app.wa_number' => $appSettings->wa_number ?? '',
            'app.weight' => $appSettings->weight ?? '',
        ]);

        View::share('settings', $appSettings);
    }
}
