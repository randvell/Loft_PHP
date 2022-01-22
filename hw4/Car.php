<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 17:22
 */

use Rate\Rate_Abstract as Rate;

class Car
{
    use Service_Trait;

    protected Rate $rate;

    protected float $km = 0;
    protected float $minutes = 0;

    /**
     * Car constructor
     *
     * @param Rate $rate
     */
    public function __construct(Rate $rate)
    {
        $this->rate = $rate;
    }

    /**
     * Получить итоговую стоимость поездки
     *
     * @return float
     */
    public function getTotalCost(): float
    {
        return $this->rate->getTotalCost($this->minutes, $this->km);
    }

    /**
     * Установка пройденного километража
     *
     * @param float $km
     * @return $this
     */
    public function setKm(float $km): self
    {
        $this->km = $km;
        return $this;
    }

    /**
     * Установка времени в пути
     *
     * @param float $minutes
     * @return $this
     */
    public function setTime(float $minutes): self
    {
        $this->minutes = $minutes;
        return $this;
    }

    /**
     * Вывести информацию о поездке
     */
    public function printInfo(): void
    {
        echo sprintf('%s Minutes %s KM, Price: %s', $this->minutes, $this->km, $this->getTotalCost());
    }
}
