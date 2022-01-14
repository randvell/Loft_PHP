<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 14.01.2022
 * Time: 20:23
 */

function task1(array $strings, bool $returnString = false): ?string
{
    $readyString = '<p>' . implode("\n<p>", $strings);

    if (!$returnString) {
        echo $readyString . "\n";
        return null;
    }

    return $readyString;
}

function task2(string $operator, ...$args)
{
    if (!in_array($operator, ['+', '-', '/', '*'])) {
        throw new InvalidArgumentException('Incorrect operator');
    }

    $result = array_shift($args);
    foreach ($args as $arg) {
        $result = eval(sprintf('return %s %s %s;', $result, $operator, $arg));
    }

    return $result;
}

function task3($x, $y)
{
    if (!is_int($x) || $x < 1 || !is_int($y) || $y < 1) {
        throw new RuntimeException('Invalid arguments');
    }

    $html = '<table>';

    for ($i = 1; $i < $y; $i++) {
        $html .= '<tr>';
        for ($j = 1; $j < $x; $j++) {
            $html .= '<td>' . $i * $j . '</td>';
        }

        $html .= "</tr>";
    }

    $html .= '</table>' . "\n";
    echo $html;
}

function task4()
{
    echo(date('Y-m-d H:i:s') . "\n");
    echo(strtotime('24.02.2016 00:00:00') . "\n");
}

function task5(string $string)
{
    return str_replace(['К', 'Две'], ['', 'Три'], $string);
}

function task6(string $filename = null)
{
    if ($filename) {
        if (!file_exists($filename)) {
            echo 'Incorrect file name';
            return null;
        }

        return file_get_contents($filename);
    }

    file_put_contents('test.txt', 'Hello again!');
    echo (task6('test.txt'));
}
