<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 14:47
 */

/**
 * Получение информации по клиенту из запроса
 *
 * @return array
 */
function getCustomerDataFromRequest(): array
{
    $customerFields = [
        'name',
        'email',
    ];

    $customerData = [];
    foreach ($customerFields as $customerField) {
        if (empty($_POST[$customerField])) {
            throw new InvalidArgumentException(sprintf('Поле %s обязательно для заполнения', $customerField));
        }

        $customerData[$customerField] = $_POST[$customerField];
    }

    return $customerData;
}

/**
 * Сохранение клиента в БД
 *
 * @param array $customerData
 *
 * @return int
 */
function processCustomerData(array $customerData): int
{
    if ($customerId = getCustomerId($customerData['email'])) {
        return $customerId;
    }

    $query = 'INSERT INTO customers (email, `name`) VALUES (:email, :name)';

    $db = Db::getInstance();
    $db->exec($query, $customerData);

    return $db->getLastInsertId();
}

function getCustomerId($email): ?int
{
    $query = 'SELECT id FROM customers WHERE email = :email';
    $params = ['email' => $email];

    $db = Db::getInstance();
    $result = $db->fetchOne($query, $params);
    if (!$result) {
        return null;
    }

    return $result['id'];
}

/**
 * Увеличить счетчик в БД
 *
 * @param int $customerId
 */
function increaseOrderCounter(int $customerId): void
{
    $query = <<<'SQL'
        UPDATE customers 
            SET order_count = (SELECT (count(*)) FROM orders WHERE customer_id = :customer_id) 
        WHERE id = :customer_id
    SQL;

    $db = Db::getInstance();
    $db->exec($query, ['customer_id' => $customerId]);
}

function getOrderCount(int $customerId)
{
    $query = 'SELECT order_count FROM customers WHERE `id` = :id';
    $params = ['id' => $customerId];

    $db = Db::getInstance();
    $result = $db->fetchOne($query, $params);
    if (!$result) {
        return null;
    }

    return $result['order_count'];
}
