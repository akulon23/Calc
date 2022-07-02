<?php

namespace Calc;

use Calc\Exception\WrongNumberException;

class Calc implements CalcInterface
{
    private int $number1;
    private int $number2;
    private string $userName;
    private int $countOperation = 0;

    public function __construct(int $number1, int $number2, string $userName)
    {
        $this->number1 = $number1;
        $this->number2 = $number2;
        $this->userName = $userName;
        $this->saveData();
    }

    private function saveData()
    {
        file_put_contents(
            PROJECT_DIR . '/var/calcData.data',
            json_encode(['userName' => $this->userName, 'number1' => $this->number1, 'number2' => $this->number2]),
            FILE_APPEND
        );
    }

    /**
     * @inheritDoc
     */
    public function addNumbers(): int
    {
        $this->countOperation++;
        return $this->number1 + $this->number2;
    }

    /**
     * @inheritDoc
     */
    public function subNumbers(): int
    {
        $this->countOperation++;
        return $this->number1 - $this->number2;
    }

    /**
     * @inheritDoc
     */
    public function multipNumbers(): int
    {
        $this->countOperation++;
        return $this->number1 * $this->number2;
    }

    /**
     * @inheritDoc
     */
    public function divideNumbers(): float
    {
        $this->countOperation++;
        if ($this->number2 === 0) {
            throw WrongNumberException::divideByNull();
        }
        return $this->number1 / $this->number2;
    }

    /**
     * @inheritDoc
     */
    public function getCountOperation(): int
    {
        return $this->countOperation;
    }
}

