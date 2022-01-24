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

        echo('Взят автомобиль по тарифу: ' . $rate->getName());
        echo '<br>';
    }

    /**
     * Подсчитать итоговую стоимость поездки с учетом сервиса
     *
     * @return float
     */
    public function getTotalCost(): float
    {
        $serviceCost = $this->getServiceCost();
        $rateCost = $this->getRateCost();

        return $rateCost + $serviceCost;
    }

    /**
     * Получить стоимость поездки по тарифу
     *
     * @return float
     */
    public function getRateCost(): float
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
        if ($this->appliedService) {
            echo sprintf('%s minutes | %s km -> <b>Price: %s + Service: %s</b>',
                $this->minutes,
                $this->km,
                $this->getRateCost(),
                $this->getServiceCost());
        } else {
            echo sprintf('%s minutes | %s km -> <b>Price: %s</b>', $this->minutes, $this->km, $this->getTotalCost());
        }
    }
}
