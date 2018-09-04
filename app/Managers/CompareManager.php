<?php

namespace App\Managers;

use App\Entities\WeatherCollection;
use App\Entities\WeatherEntity;

class CompareManager
{
    public function compare(WeatherCollection $weatherCollection) : WeatherCollection
    {
        /** @var WeatherEntity $weather */
        foreach ($weatherCollection as $weather) {
            $weather->index = $this->calculate($weather);
        }

        $sorted = $weatherCollection
            ->sortBy(function (WeatherEntity $weather) {
                return $weather->index;
            });

        return $sorted->values();
    }

    public function calculate(WeatherEntity $weather) : int
    {
        return $this->getWindIndex($weather->windSpeed)
            + $this->getVisibilityIndex($weather->visibility)
            + $this->getTemperatureIndex($weather->temperature)
            + $this->getWeatherIndex($weather->weather);
    }

    private function getWindIndex(int $speed) : int
    {
        $norma = 2;
        $index = 0;

        while ($speed > $norma) {
            $index++;
            $speed -= 2;
        }

        return $index;
    }

    private function getVisibilityIndex(int $percentage) : int
    {
        $norma = 100;
        $index = 0;

        while ($percentage < $norma) {
            $index++;
            $percentage += 20;
        }

        return $index;
    }

    private function getTemperatureIndex(int $temperature) : int
    {
        $norma = 25;
        $index = 0;

        while ($temperature < $norma) {
            $norma++;
            $temperature += 5;
        }

        return $index;
    }

    private function getWeatherIndex(string $weather) : int
    {
        return WeatherEntity::WEATHER_MAP[$weather] ?? WeatherEntity::AWFUL_CONDITION;
    }
}
