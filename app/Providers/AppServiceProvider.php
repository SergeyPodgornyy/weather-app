<?php

namespace App\Providers;

use App\Exceptions\MissingApiKeyException;
use App\Interfaces\WeatherLoaderInterface;
use App\Managers\ApiWeatherLoader;
use App\Managers\CompareManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     * @throws \App\Exceptions\MissingApiKeyException
     */
    public function register()
    {
        $this->app->bind(WeatherLoaderInterface::class, ApiWeatherLoader::class);

        $openWeatherKey = env('OPEN_WEATHER_KEY');

        if (!$openWeatherKey) {
            throw new MissingApiKeyException();
        }

        $this->app->when(ApiWeatherLoader::class)
            ->needs('$key')
            ->give($openWeatherKey);
    }
}
