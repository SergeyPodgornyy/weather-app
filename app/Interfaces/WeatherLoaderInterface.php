<?php

namespace App\Interfaces;

use App\Entities\CityCollection;
use App\Entities\WeatherCollection;

interface WeatherLoaderInterface
{
    /**
     * Load weather for cities
     *
     * @param   CityCollection  $cities
     * @return  WeatherCollection
     */
    public function load(CityCollection $cities) : WeatherCollection;
}
