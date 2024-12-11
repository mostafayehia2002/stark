<?php

namespace App\Providers;

use App\Models\Setting;
use http\Env;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{

    protected  array $settings;
    /**
     * Register services.
     *
     *
     */

    public function register(): void
    {
        //
        // Register the settings singleton
        $this->app->singleton('settings', function () {

            return $this;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load settings and cache them
        $this->loadSettings();
        $this->setAppNameFromSettings();
        $this->setTimezoneFromSettings();




    }
    public function getValue($type, $key)
    {
        $filtered = collect($this->settings[$type] ?? [])
            ->where('key', $key)
            ->first();
        return $filtered['value'] ?? null;
    }

    private function loadSettings(): void
    {
        $this->settings = Setting::all()->groupBy('type')->toArray();
         cache()->rememberForever('settings', function () {
            return $this->settings;
        });
    }

    private function setAppNameFromSettings(): void
    {
        $appName = $this->getValue('general', 'site_name');
        if ($appName) {
            Config::set('app.name', $appName);
            env('APP_NAME',$appName);
          //putenv('APP_NAME=' . $appName);
        }
    }

    private function setTimezoneFromSettings(): void
    {
        $timezone = $this->getValue('general', 'timezone');
        if ($timezone) {
            env('APP_TIMEZONE',$timezone);
            Config::set('app.timezone', $timezone);
        }
    }


}
