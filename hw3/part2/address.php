<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 14:20
 */

function getAddressFromRequest(): string
{
    if (empty($_POST)) {
        throw new RuntimeException('Не обнаружено POST запроса');
    }

    $addressFields = ['street' => 'ул.', 'home' => 'д.', 'part' => 'корп.', 'appt' => 'кв.', 'floor' => 'эт.'];

    $addressString = '';
    foreach ($addressFields as $key => $prefix) {
        $addressPart = $_POST[$key] ?? null;
        if (is_null($addressPart)) {
            continue;
        }

        if ($addressString) {
            $addressString .= ', ';
        }

        $addressString .= $prefix . ' ' . $addressPart;
    }

    return $addressString;
}
