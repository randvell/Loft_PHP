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
        $serviceType = $service::class;
        if (array_key_exists($serviceType, $this->appliedService)) {
            return;
        }

        echo(sprintf('Добавлен сервис: %s', $service->getName()));
        echo '<br>';

        $this->appliedService[$serviceType] = $service;
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
}
