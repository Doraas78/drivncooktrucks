<?php


class CityModel extends Model
{
    function __construct()
    {
        parent::__construct('CITY');
    }
    public function getCities()
    {
        return $this->all();
    }

}