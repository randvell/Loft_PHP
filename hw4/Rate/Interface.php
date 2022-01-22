<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 16:42
 */

namespace Rate;

interface Rate_Interface
{
    /**
     * Подсчет итоговой стоимости поездки
     *
     * @return float
     */
    function getTotalCost(): float;
}
