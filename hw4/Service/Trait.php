<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 16:43
 */

use Service\Service_Abstract as Service;
use Rate\Rate_Abstract as Rate;

trait Service_Trait
{
    /**
     * @var Service[]
     */
    protected array $appliedService = [];

    /**
     * Применить сервис к тарифу
     *
     * @param Service $service
     */
    public function applyService(Service $service): void
    {
        if (in_array($service::class, $this->appliedService, true)) {
            return;
        }

        $this->appliedService[] = $service::class;
    }

    /**
     * Подсчитать стоимость поездки с учетом сервиса
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
        /** @var Rate $rate */
        $rate = $this->rate;
        return $rate->getTotalCost($this->minutes, $this->km);
    }

    /**
     * Получить стоимость поездки с учетом сервиса
     *
     * @return float
     */
    public function getServiceCost(): float
    {
        $serviceCost = 0;
        foreach ($this->appliedService as $service) {
            $serviceCost += $service->getTotalCost($this->minutes, $this->km);
        }

        return $serviceCost;
    }

    /**
     * Вывести информацию о поездке
     */
    public function printInfo(): void
    {
        echo sprintf('%s Minutes %s KM, Price: %s (Service: %s)',
            $this->minutes,
            $this->km,
            $this->getRateCost(),
            $this->getServiceCost());
    }
}
