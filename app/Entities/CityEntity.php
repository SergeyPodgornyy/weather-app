<?php

namespace App\Entities;

use App\Traits\PropertyAwareTrait;

/**
 * Class CityEntity
 *
 * @property int    $id
 * @property string $name
 * @property string $country
 */
class CityEntity
{
    use PropertyAwareTrait;

    /** @var int|null */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $country;

    /**
     * @param   int     $id
     * @return  self
     */
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param   string  $name
     * @return  self
     */
    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param   string  $country
     * @return  self
     */
    public function setCountry(string $country) : self
    {
        $this->country = $country;

        return $this;
    }
}
