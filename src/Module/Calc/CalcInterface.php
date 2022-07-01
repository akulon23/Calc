<?php
namespace Calc;

use Calc\Exception\WrongNumberException;

interface CalcInterface
{
    /**
     * Pobieranie ilosci wykonanych operacji
     * @return int
     */
    public function getCountOperation(): int;

    /**
     * Metoda dodajaca dwie liczby
     * @param int $number1
     * @param int $number2
     * @return int
     */
    public function addNumbers(int $number1, int $number2): int;

    /**
     * Metoda odejmujaca dwie liczby od siebie
     * @param int $number1
     * @param int $number2
     * @return int
     */
    public function subNumbers(int $number1, int $number2): int;

    /**
     * Metoda mnozaca dwie liczby
     * @param int $number1
     * @param int $number2
     * @return int
     */
    public function multipNumbers(int $number1, int $number2): int;

    /**
     * Metoda dzielaca dwie liczby
     * @param int $number1
     * @param int $number2
     * @return float
     * @throws WrongNumberException
     */
    public function divideNumbers(int $number1, int $number2): float;

}