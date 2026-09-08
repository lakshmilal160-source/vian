<?php

namespace App\Providers;
use App\Models\Setting;
use App\Models\Service;
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
        $setting = Setting::first()->with('countryCode1');
        $services = Service::all();
        View::share([
            'globalSetting' => $setting,
            'globalService' => $services           
        ]);
    }
}
