<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 17:19
 */

namespace Rate;

class Rate_Hourly extends Rate_Abstract
{
    protected string $name = 'Почасовой';

    protected float $pricePerHour = 200;
}
