<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 14.01.2022
 * Time: 20:41
 */

function checkDay($day)
{
    if ($day > 5) {
        echo 'Это выходной день';
    } elseif ($day > 0) {
        echo 'Это рабочий день';
    } else {
        echo 'Неизвестный день';
    }

    echo "\n";
}

$day = rand(0, 7);
echo("День: $day\n");
checkDay($day);
