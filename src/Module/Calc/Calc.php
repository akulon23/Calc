<?php

namespace Calc;

use Calc\Exception\WrongNumberException;

class Calc implements CalcInterface
{

    private int $countOperation = 0;
    private CalcSaveDataInterface $calcSaveData;
    private CalcData $calcData;

    public function __construct(CalcData $calcData, CalcSaveDataInterface $calcSaveData)
    {
        $this->calcSaveData = $calcSaveData;
        $this->calcData = $calcData;
        $this->calcSaveData->saveData($this->calcData);
    }

    /**
     * @inheritDoc
     */
    public function addNumbers(): int
    {
        $this->countOperation++;
        return $this->calcData->getNumber1() + $this->calcData->getNumber2();
    }

    /**
     * @inheritDoc
     */
    public function subNumbers(): int
    {
        $this->countOperation++;
        return $this->calcData->getNumber1() - $this->calcData->getNumber2();
    }

    /**
     * @inheritDoc
     */
    public function multipNumbers(): int
    {
        $this->countOperation++;
        return $this->calcData->getNumber1() * $this->calcData->getNumber2();
    }

    /**
     * @inheritDoc
     */
    public function divideNumbers(): float
    {
        $this->countOperation++;
        if ($this->calcData->getNumber2() === 0) {
            throw WrongNumberException::divideByNull();
        }
        return $this->calcData->getNumber1() / $this->calcData->getNumber2();
    }

    /**
     * @inheritDoc
     */
    public function getCountOperation(): int
    {
        return $this->countOperation;
    }
}

