<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 14.01.2022
 * Time: 20:29
 */

$name = 'Никита';
$age = 27;

echo("Меня зовут: $name\n");
echo("Мне $age лет\n");

$charString = '"!|/\'"\\';
foreach (str_split($charString) as $char) {
    echo $char . "\n";
}
