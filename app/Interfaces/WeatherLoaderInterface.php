<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface WeatherLoaderInterface
{
    /**
     * Load weather for cities
     *
     * @param   Collection $cities
     * @return  Collection
     */
    public function load(Collection $cities) : Collection;
}
