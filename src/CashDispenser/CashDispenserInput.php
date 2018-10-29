<?php
/**
 * Created by PhpStorm.
 * User: grishi
 * Date: 29.10.18
 * Time: 21:19
 */

namespace CashDispenser;


/**
 * Class CashDispenserInput
 *
 * @package CashDispenser
 */
class CashDispenserInput
{
    /**
     * Сумма для выдачи
     *
     * @var int
     */
    protected $sum;

    /**
     * крупными или мелкими купюрами
     *
     * @var boolean
     */
    protected $largeBills;

    /**
     * CashDispenserInput constructor.
     *
     * @param int  $sum
     * @param bool $largeBills
     */
    public function __construct(int $sum, $largeBills = true)
    {
        $this->setSum($sum);
        $this->setLargeBills($largeBills);
    }

    /**
     * @return int
     */
    public function getSum(): int
    {
        return $this->sum;
    }

    /**
     * @param int $sum
     *
     * @return CashDispenserInput
     */
    protected function setSum(int $sum): CashDispenserInput
    {
        $this->sum = $sum;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLargeBills(): bool
    {
        return $this->largeBills;
    }

    /**
     * @param bool $largeBills
     *
     * @return CashDispenserInput
     */
    protected function setLargeBills(bool $largeBills): CashDispenserInput
    {
        $this->largeBills = $largeBills;
        return $this;
    }
}
