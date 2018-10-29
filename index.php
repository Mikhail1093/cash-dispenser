<?php
declare(strict_types=1);

use CashDispenser\CashDispenserInput;
use CashDispenser\Exceptions\InputCashDispenserException;

require_once __DIR__ . '/vendor/autoload.php';

try {
    $cashDispenser = new \CashDispenser\CashDispenser(
        new CashDispenserInput(5000)
    );
} catch (InputCashDispenserException $cashDispenserException) {
    print_r($cashDispenserException->getMessage());
}
