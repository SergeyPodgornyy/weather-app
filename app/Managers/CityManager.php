<?php

namespace App\Managers;

use App\Entities\CityCollection;
use App\Entities\CityEntity;

class CityManager
{
    /**
     * Parse data from request to CityEntity's collection
     *
     * @param   array       $cities
     * @return  CityCollection
     */
    public function parse(array $cities) : CityCollection
    {
        $result = new CityCollection;

        foreach ($cities as $city) {
            $entity = new CityEntity;

            $entity->id = $city['id'] ?? null;
            $entity->name = $city['name'] ?? null;
            $entity->country = $city['country'] ?? null;

            $result->push($entity);
        }

        return $result;
    }
}
