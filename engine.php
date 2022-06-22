<?php

// Pobranie zmiennych z formularza
$number1 = getPostParam('number1', 0);
$number2 = getPostParam('number2', 0);
$operationType = getPostParam('operation-type', []);

// Sprawdzenie koniecznych warunkow i zwrocenie wynikow
if ($number1 >= 0 && $number2 >= 0 && !empty($operationType)) {
    if (in_array("add", $operationType)) {
        echo 'Wynik dodawania: ' . addNumbers($number1, $number2) . '<br>';
    }
    if (in_array("sub", $operationType)) {
        echo 'Wynik odejmowania: ' . subNumbers($number1, $number2) . '<br>';
    }
    if (in_array("multip", $operationType)) {
        echo 'Wynik mnożenia: ' . multipNumbers($number1, $number2) . '<br>';
    }
    if (in_array("divide", $operationType)) {
        if ($number2 > 0) {
            echo 'Wynik dzielenia: ' . divideNumbers($number1, $number2) . '<br>';
        } else {
            echo 'Wynik dzielenia: Liczba 2 musi być większa od 0!';
        }
    }
}
/**
 * Funkcja pobiera wartosc z tablicy superglobalnej $_POST lub zwraca domyslna wartosc
 * @param string $paramName Nazwa pobieranego parametru
 * @param mixed $defaultValue Wartosc domyślna
 * @return mixed Wartosc parametru
 */
function getPostParam(string $paramName, $defaultValue)
{
    if (array_key_exists($paramName, $_POST)) {
        return $_POST[$paramName];
    }
    return $defaultValue;
}
/**
 * Funkcja odpowiedzialna za dodawanie liczb
 * @param int $number1 pierwsza liczba
 * @param int $number2 liczba
 * @return int suma liczb
 */
function addNumbers(int $number1, int $number2): int
{
    return $number1 + $number2;
}

/**
 *
 * @param int $number1
 * @param int $number2
 * @return int
 */
function subNumbers(int $number1, int $number2): int
{
    return $number1 - $number2;
}

/**
 *
 * @param int $number1
 * @param int $number2
 * @return int
 */
function multipNumbers(int $number1, int $number2): int
{
    return $number1 * $number2;
}

/**
 *
 * @param int $number1
 * @param int $number2
 * @return float
 */
function divideNumbers(int $number1, int $number2): float
{
    return $number1 / $number2;
}
