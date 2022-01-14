<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 14.01.2022
 * Time: 20:33
 */

function checkAge(int $age)
{
    if ($age > 65) {
        echo 'Вам пора на пенсию';
    } elseif ($age >= 18) {
        echo 'Вам еще работать и работать';
    } elseif ($age >= 1) {
        echo 'Вам ещё рано работать';
    } else {
        echo 'Неизвестный возраст';
    }

    echo "\n";
}

$age = rand(-10, 100);
echo("Возраст: $age\n");
checkAge($age);
