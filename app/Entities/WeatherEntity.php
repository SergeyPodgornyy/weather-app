<?php

namespace App\Entities;

use App\Traits\PropertyAwareTrait;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class WeatherEntity
 *
 * @property int    $id
 * @property string $city
 * @property int    $windSpeed
 * @property int    $visibility
 * @property float  $temperature
 * @property string $weather
 * @property int|null   $index
 */
class WeatherEntity implements Arrayable
{
    use PropertyAwareTrait;

    public const WEATHER_CLEAR      = 'Clear';
    public const WEATHER_CLOUD      = 'Clouds';
    public const WEATHER_MIST       = 'Mist';
    public const WEATHER_RAIN       = 'Rain';
    public const WEATHER_SNOW       = 'Snow';
    public const WEATHER_EXTREME    = 'Extreme';

    public const PERFECT_CONDITION  = 0;
    public const GOOD_CONDITION     = 1;
    public const BAD_CONDITION      = 2;
    public const AWFUL_CONDITION    = 3;

    public const WEATHER_MAP = [
        self::WEATHER_CLEAR     => self::PERFECT_CONDITION,
        self::WEATHER_CLOUD     => self::GOOD_CONDITION,
        self::WEATHER_MIST      => self::GOOD_CONDITION,
        self::WEATHER_RAIN      => self::BAD_CONDITION,
        self::WEATHER_SNOW      => self::BAD_CONDITION,
        self::WEATHER_EXTREME   => self::AWFUL_CONDITION,
    ];

    /** @var int */
    private $id;

    /** @var string */
    private $city;

    /** @var int */
    private $windSpeed;

    /** @var int */
    private $visibility;

    /** @var float */
    private $temperature;

    /** @var string */
    private $weather;

    /** @var int|null */
    private $index;

    public function toArray() : array
    {
        return get_object_vars($this);
    }
}
