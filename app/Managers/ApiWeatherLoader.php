<?php

namespace App\Managers;

use App\Entities\CityCollection;
use App\Entities\CityEntity;
use App\Entities\WeatherCollection;
use App\Entities\WeatherEntity;
use App\Interfaces\WeatherLoaderInterface;
use GuzzleHttp\Client;
use function GuzzleHttp\Promise\settle;

class ApiWeatherLoader implements WeatherLoaderInterface
{
    private const API_URL = '/data/2.5/weather';

    /** @var string */
    private $key;

    /** @var Client */
    private $client;

    public function __construct(string $key, Client $client)
    {
        $this->key = $key;
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function load(CityCollection $cities) : WeatherCollection
    {
        $promises = [];

        /** @var CityEntity $city */
        foreach ($cities as $city) {
            $url = $this->buildUrlString($city);
            $promises[] = $this->client->getAsync($url);
        }

        $responses = settle($promises)->wait();

        return $this->parseResponse($responses);
    }

    private function buildUrlString(CityEntity $city) : string
    {
        $queryString = $city->id
            ? http_build_query([ 'id' => $city->id, 'appid' => $this->key ])
            : http_build_query([ 'q'  => "$city->name,$city->country", 'appid' => $this->key ]);

        return \sprintf('%s?%s', self::API_URL, $queryString);
    }

    private function parseResponse(array $responses) : WeatherCollection
    {
        $result = new WeatherCollection();

        foreach ($responses as $response) {
            $content = \GuzzleHttp\json_decode($response['value']->getBody()->getContents());
            $weather = new WeatherEntity();

            $weather->id = $content->id;
            $weather->city = $content->name;
            $weather->windSpeed = $content->wind->speed;
            $weather->visibility = $content->visibility / 100;
            $weather->temperature = $content->main->temp - 273.15;
            $weather->weather = $content->weather[0] ? $content->weather[0]->main : '';

            $result->push($weather);
        }

        return $result;
    }
}
