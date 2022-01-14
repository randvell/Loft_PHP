<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 14.01.2022
 * Time: 20:55
 */

function drawTable($x, $y)
{
    $html = '<table>';

    for ($i = 1; $i < $y; $i++) {
        $html .= '<tr>';
        for ($j = 1; $j < $x; $j++) {
            $value = $i * $j;
            if ($i % 2 === 0 && $j % 2 === 0) {
                $value = '(' . $value . ')';
            } elseif ($i % 2 === 1 && $j % 2 === 1) {
                $value = '[' . $value . ']';
            }

            $html .= '<td>' . $value . '</td>';
        }

        $html .= "</tr>";
    }

    $html .= '</table>';
    echo $html;
}

drawTable(10, 10);
