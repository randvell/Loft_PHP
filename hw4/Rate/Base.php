<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 16:57
 */

namespace Rate;

class Rate_Base extends Rate_Abstract
{
    protected string $name = 'Базовый';

    protected float $pricePerKm = 10;
    protected float $pricePerMinute = 3;
}
