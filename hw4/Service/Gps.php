<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 17:37
 */

namespace Service;

class Service_Gps extends Service_Abstract
{
    protected float $pricePerHour = 15;

    function getTotalCost(float $minutes = 0, float $km = 0): float
    {
        $hours = ceil($minutes / 60);
        if (!$hours) {
            $hours = 1;
        }

        return $hours * $this->pricePerHour;
    }
}
