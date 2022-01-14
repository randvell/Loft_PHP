<?php
/**
 * Created by PhpStorm.
 * User: Nikita Zimin
 * Date: 14.01.2022
 * Time: 20:03
 */

const TEST_CONSTANT = 'asd';

/**
 * @return string
 */
function showSomething(): string
{
    return 'SOMETHING';
}

$userName = 'Igor';

// Ошибка в бесполезном условии ? Привел к строгому сравнению
if (1 === 1) {
    echo 'hi';
}
