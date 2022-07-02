<?php


namespace Calc;


class CalcData
{
    private int $number1;
    private int $number2;
    private string $userName;

    /**
     * CalcData constructor.
     * @param int $number1
     * @param int $number2
     * @param string $userName
     */
    public function __construct(int $number1, int $number2, string $userName)
    {
        $this->number1 = $number1;
        $this->number2 = $number2;
        $this->userName = $userName;
    }

    /**
     * @return int
     */
    public function getNumber1(): int
    {
        return $this->number1;
    }

    /**
     * @return int
     */
    public function getNumber2(): int
    {
        return $this->number2;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }
}