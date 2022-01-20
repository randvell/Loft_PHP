<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 20.01.2022
 * Time: 22:48
 */

function task1(): ?array
{
    $customers = generateRandomCustomers();
    $json = json_encode($customers, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

    $filename = 'users.json';
    file_put_contents($filename, $json);

    $loadedCustomersData = file_get_contents($filename);
    if (!$loadedCustomersData) {
        throw new RuntimeException('Не удалось загрузить информацию из файла ' . $filename);
    }
    $customers = json_decode($loadedCustomersData, true);

    return getCustomersStats($customers);
}

function generateRandomCustomers(int $count = 50): array
{
    $names = ['Виталий', 'Татьяна', 'Арсений', 'Екатерина', 'Мария'];

    $customersData = [];
    for ($i = 0; $i < $count; $i++) {
        $customersData[] = [
            'id' => $i,
            'name' => $names[rand(0, 4)],
            'age' => rand(18, 45),
        ];
    }

    return $customersData;
}

function getCustomersStats(array $customers): array
{
    $ageAcc = 0;
    $nameAcc = [];
    foreach ($customers as $customer) {
        $age = $customer['age'];
        $name = $customer['name'];

        $ageAcc += $age;
        $nameAcc[$name] = isset($nameAcc[$name]) ? $nameAcc[$name] + 1 : 1;
    }

    arsort($nameAcc);

    return [
        'Average Age' => $ageAcc / count($customers),
        'Name stat' => $nameAcc,
    ];
}
