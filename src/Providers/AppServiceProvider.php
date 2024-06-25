<?php

namespace EvoManager\Providers;

use EvolutionCMS\Models\SystemSetting;
use EvoManager\Hashing\EvoHasher;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
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
        Hash::extend('evo', static function () {
            return new EvoHasher();
        });

        Config::set('global', Cache::rememberForever('global.settings', function () {
            return SystemSetting::all()
                ->pluck('setting_value', 'setting_name')
                ->toArray();
        }));

        $this->app->setLocale(Config::get('global.manager_language', 'en'));
    }
}
