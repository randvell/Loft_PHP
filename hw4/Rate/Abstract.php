<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 16:48
 */

namespace Rate;

abstract class Rate_Abstract implements Rate_Interface
{
    protected string $name = '';

    protected float $pricePerKm = 0;
    protected float $pricePerMinute = 0;
    protected float $pricePerHour = 0;
    protected float $pricePerService = 0;

    /**
     * @inheritDoc
     */
    public function getTotalCost(float $minutes = 0, float $km = 0): float
    {
        $total = 0;

        // Подсчет единоразовых трат
        if ($price = $this->pricePerService) {
            $total += $price;
        }

        // Подсчет трат по километражу
        if ($km && ($price = $this->pricePerKm)) {
            $total += ceil($km) * $price;
        }

        // Подсчет трат по времени
        if ($minutes) {
            if ($price = $this->pricePerMinute) {
                $total += round($minutes) * $price;
            } elseif ($price = $this->pricePerHour) {
                $total += ceil($minutes / 60) * $price;
            }
        }

        return $total;
    }

    /**
     * Получить название метода
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
