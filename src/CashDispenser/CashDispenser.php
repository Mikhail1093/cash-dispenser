<?php
declare(strict_types=1);

namespace CashDispenser;

use CashDispenser\Exceptions\CashDispenserException;
use CashDispenser\Exceptions\InputCashDispenserException;

/**
 * Class CashDispenser
 *
 * @package CashDispenser
 */
class CashDispenser
{
    /**
     *
     *
     * @var CashDispenserInput
     */
    protected $cashDispenserInput;

    /**
     * @var Banknotes
     */
    protected $banknotes;

    /**
     * Общая сумма в банкомате
     *
     * @var int
     */
    protected $cashDispenserSum;

    /**
     * CashDispenser constructor.
     *
     * @param CashDispenserInput $cashDispenserInput
     *
     * @throws \CashDispenser\Exceptions\InputCashDispenserException
     */
    public function __construct(CashDispenserInput $cashDispenserInput)
    {
        $this->banknotes = new Banknotes();

        $this->checkNecessarySum($cashDispenserInput->getSum(), $this->calculateCashDispenserSum());

        $this->setCashDispenserInput($cashDispenserInput);
        $this->getSortBanknotes();

        print_r($this->getSortBanknotes());
        print_r($this->getBanknotesConntByNomilal());
    }

    /**
     * @return CashDispenserInput
     */
    public function getCashDispenserInput(): CashDispenserInput
    {
        return $this->cashDispenserInput;
    }

    /**
     * @param CashDispenserInput $cashDispenserInput
     *
     * @return CashDispenser
     */
    protected function setCashDispenserInput(CashDispenserInput $cashDispenserInput): CashDispenser
    {
        $this->cashDispenserInput = $cashDispenserInput;
        return $this;
    }

    protected function getSortBanknotes(): array
    {
        $sortedBanknotes = $this->banknotes->getBanknotes();
        sort($sortedBanknotes);

        if ($this->cashDispenserInput->isLargeBills()) {
            arsort($sortedBanknotes);
        }

        return $sortedBanknotes;
    }

    protected function getBanknotesConntByNomilal()
    {
        return array_count_values($this->banknotes->getBanknotes());
    }

    /**
     * Получить сумму денег в банкомате
     */
    protected function calculateCashDispenserSum()
    {
        return array_sum($this->banknotes->getBanknotes());
    }

    /**
     * Проверить, что в банкомате достаточно средств
     *
     * @param int $sum
     * @param int $sumInCashDispenser
     *
     * @throws \CashDispenser\Exceptions\InputCashDispenserException
     */
    protected function checkNecessarySum(int $sum, int $sumInCashDispenser): void
    {
        //todo
        if($sum > $sumInCashDispenser) {
            throw new InputCashDispenserException('Запрашиваемая сумма недоступна' . \PHP_EOL, 100);
        }
    }
}
