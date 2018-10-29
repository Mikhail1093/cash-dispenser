<?php
declare(strict_types=1);

namespace CashDispenser;


/**
 * Class Banknotes
 *
 * @package CashDispenser
 */
class Banknotes extends \SplQueue
{
    protected $banknotes = [
        100,
        5000,
        100,
        100,
        50,
        500,
        100,
        50,
        50,
        100
    ];

    /**
     * @return array
     */
    public function getBanknotes(): array
    {
        return $this->banknotes;
    }

}
