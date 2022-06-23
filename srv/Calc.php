<?php
require_once 'CalcInterface.php';

class Calc implements CalcInterface
{
    private int $countOperation=0;

    /**
     * @inheritDoc
     */
    public function addNumbers(int $number1, int $number2): int
    {
        $this->countOperation++;
        return $number1 + $number2;
    }

    /**
     * @inheritDoc
     */
    public function subNumbers(int $number1, int $number2): int
    {
        $this->countOperation++;
        return $number1 - $number2;
    }

    /**
     * @inheritDoc
     */
    public function multipNumbers(int $number1, int $number2): int
    {
        $this->countOperation++;
        return $number1 * $number2;
    }

    /**
     * @inheritDoc
     */
    public function divideNumbers(int $number1, int $number2): float
    {
        $this->countOperation++;
        return $number1 / $number2;
    }

    /**
     * @inheritDoc
     */
    public function getCountOperation(): int
    {
        return $this->countOperation;

    }
}

