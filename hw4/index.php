<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 16:42
 */

require 'Loader.php';

use Rate\Rate_Base;
use Rate\Rate_Hourly;
use Service\Service_Gps;

$car1 = new Car(new Rate_Base());
$car1->printInfo();
echo '<br>';

$car1->setKm(10);
$car1->setTime(25);
$car1->printInfo();
echo '<br>';

$car2 = new Car(new Rate_Hourly());
$car2->applyService(new Service_Gps());
$car2->printInfo();
echo '<br>';

$car2->setKm(10);
$car2->setTime(25);
$car2->printInfo();
echo '<br>';
