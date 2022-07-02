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
     * @return int
     */
    public function addNumbers(): int;

    /**
     * Metoda odejmujaca dwie liczby od siebie
     * @return int
     */
    public function subNumbers(): int;

    /**
     * Metoda mnozaca dwie liczby
     * @return int
     */
    public function multipNumbers(): int;

    /**
     * Metoda dzielaca dwie liczby
     * @return float
     * @throws WrongNumberException
     */
    public function divideNumbers(): float;

}