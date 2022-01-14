<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 14.01.2022
 * Time: 20:44
 */

function introduceCars($cars)
{
    $string = '';
    foreach ($cars as $name => $carData) {
        $carString = '';
        foreach ($carData as $value) {
            if ($carString) {
                $carString .= ' ';
            }

            $carString .= $value;
        }

        $string .= (sprintf("CAR %s \n%s\n\n", $name, $carString));
    }

    echo $string;
}

$bmw = [
    'model' => 'X5',
    'speed' => '120',
    'doors' => '5',
    'year' => '2015',
];

$toyota = [
    'model' => 'Cresta',
    'speed' => '110',
    'doors' => '5',
    'year' => '2018',
];

$opel = [
    'model' => 'Astra',
    'speed' => '100',
    'doors' => '3',
    'year' => '2014',
];

$cars = ['BMW' => $bmw, 'Toyota' => $toyota, 'Opel' => $opel];
introduceCars($cars);
