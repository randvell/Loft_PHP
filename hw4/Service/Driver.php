<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 17:37
 */

namespace Service;

class Service_Driver extends Service_Abstract
{
    protected float $pricePerService = 100;

    function getTotalCost(float $minutes = 0, float $km = 0): float
    {
        return $this->pricePerService;
    }
}
