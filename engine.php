<?php
require_once 'srv/calc.php';
// Pobranie zmiennych z formularza
$number1 = getPostParam('number1', 0);
$number2 = getPostParam('number2', 0);
$operationType = getPostParam('operation-type', []);

$calc = new Calc ();

// Sprawdzenie koniecznych warunkow i zwrocenie wynikow
if ($number1 >= 0 && $number2 >= 0 && !empty($operationType)) {
    if (in_array("add", $operationType)) {
        echo 'Wynik dodawania: ' . $calc->addNumbers($number1, $number2) . '<br>';
    }
    if (in_array("sub", $operationType)) {
        echo 'Wynik odejmowania: ' . $calc->subNumbers($number1, $number2) . '<br>';
    }
    if (in_array("multip", $operationType)) {
        echo 'Wynik mnożenia: ' . $calc->multipNumbers($number1, $number2) . '<br>';
    }
    if (in_array("divide", $operationType)) {
        if ($number2 > 0) {
            echo 'Wynik dzielenia: ' . $calc->divideNumbers($number1, $number2) . '<br>';
        } else {
            echo 'Wynik dzielenia: Liczba 2 musi być większa od 0!';
        }
    }
    echo 'Kalkulator wykonał: ' . $calc->getCountOperation() . ' operacji.';
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


