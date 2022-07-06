<?php

namespace Calc;

use Calc\Exception\WrongNumberException;

interface CalcInterface
{
    /**
     * Downloading the number of operations performed
     * @return int
     */
    public function getCountOperation(): int;

    /**
     * Method to add two numbers
     * @return int
     */
    public function addNumbers(): int;

    /**
     * Method of subtracting two numbers from each other
     * @return int
     */
    public function subNumbers(): int;

    /**
     * A method that multiplies two numbers
     * @return int
     */
    public function multipNumbers(): int;

    /**
     * A method that divides two numbers
     * @return float
     * @throws WrongNumberException
     */
    public function divideNumbers(): float;

}