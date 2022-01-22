<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 17:02
 */

namespace Service;

abstract class Service_Abstract
{
    protected float $pricePerService = 0;

    protected float $pricePerKm = 0;
    protected float $pricePerMinute = 0;
    protected float $pricePerHour = 0;

    abstract function getTotalCost(float $minutes = 0, float $km = 0): float;

    public function getPricePerService(): float
    {
        return $this->pricePerService;
    }

    public function getPricePerKm(): float
    {
        return $this->pricePerKm;
    }

    public function getPricePerMinute(): float
    {
        return $this->pricePerMinute;
    }

    public function getPricePerHour(): float
    {
        return $this->pricePerHour;
    }
}
