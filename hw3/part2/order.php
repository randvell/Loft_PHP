<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 22.01.2022
 * Time: 14:12
 */

require_once 'customer.php';
require_once 'address.php';
require_once '../../db.php';

/**
 * Создание заказа
 */
function createOrderFromRequest()
{
    try {
        $customerData = getCustomerDataFromRequest();
        $orderData = getOrderDataFromRequest();

        $customerId = processCustomerData($customerData);
        $orderData['customer_id'] = $customerId;

        $order = processOrderData($orderData);

        $orderId = $order['id'];
        $orderAddress = $order['address'];
        $ordersCount = getOrderCount($customerId);

        echo sprintf('Спасибо, ваш заказ будет доставлен по адресу: %s<br>Номер вашего заказа: #%s<br>' .
            'Это ваш %s-й заказ!',
            $orderAddress,
            $orderId,
            $ordersCount
        );
    } catch (Throwable $e) {
        echo 'Ошибка при создании заказа! (' . $e->getMessage() . ')';
    }
}

/**
 * Получение информации по заказу из запроса
 *
 * @return array
 */
function getOrderDataFromRequest(): array
{
    $orderFields = [
        'phone',
        'comment',
        // todo тут могли бы быть radio пункты, но они не прописаны в верстке и мне тоже лень
    ];

    $address = getAddressFromRequest();
    if (!$address) {
        throw new InvalidArgumentException('Передан пустой адрес');
    }

    // Собираем информацию по заказу
    $orderData = [];
    foreach ($orderFields as $orderField) {
        if (!empty($_POST[$orderField])) {
            $orderData[$orderField] = $_POST[$orderField];
        }
    }
    if (!$orderData) {
        throw new InvalidArgumentException('Передана некорректная информация по заказу!');
    }

    $orderData['phone'] = preg_replace('/[^0-9.]+/', '', $orderData['phone']);
    $orderData['address'] = $address;

    return $orderData;
}

/**
 * Сохранение заказа в БД
 *
 * @param array $orderData
 * @return array
 */
function processOrderData(array $orderData): array
{
    $query = 'INSERT into orders (customer_id, address, phone, comment) VALUES (:customer_id, :address, :phone, :comment)';

    $db = Db::getInstance();
    $db->exec($query, $orderData);
    $orderId = $db->getLastInsertId();

    $order = getOrder($orderId);
    $customerId = $order['customer_id'];
    increaseOrderCounter($customerId);

    return $order;
}

/**
 * Получить информацию по заказу
 *
 * @param int $orderId
 * @return array
 */
function getOrder(int $orderId): array
{
    $query = 'SELECT * FROM orders WHERE id = :order_id';
    return Db::getInstance()->fetchOne($query, ['order_id' => $orderId]);
}
