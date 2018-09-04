<?php

namespace App\Managers;

use App\Interfaces\WeatherLoaderInterface;
use Illuminate\Support\Collection;

class ApiWeatherLoader implements WeatherLoaderInterface
{
    /** @var string */
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @param Collection[CitiEntity] $cities
     */
    public function load(Collection $cities) : Collection
    {
        // TODO: Implement load() method.
    }
}
