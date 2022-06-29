<?php

namespace Application;

use Application\Helpers\Params;
use Calc\Calc;

class Engine
{
    private $params;

    /**
     * Engine constructor
     */
    public function __construct()
    {
        $this->params = new Params();
    }


    public function start()
    {

        // Pobranie zmiennych z formularza
        $number1 = $this->params->getPostParam('number1', 0);
        $number2 = $this->params->getPostParam('number2', 0);
        $operationType = $this->params->getPostParam('operation-type', []);

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
    }

}


