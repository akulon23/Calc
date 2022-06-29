<?php

namespace Application;

use Application\Helpers\Params;
use Calc\Calc;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

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
        $loader = new FilesystemLoader(__DIR__ . '/Views');
        $twig = new Environment($loader, [
        ]);

        $template = $twig->load('calcForm.twig');

        $templateParams = [
            'number1' => $number1,
            'number2' => $number2,
        ];

        if (in_array("add", $operationType)) {
            $templateParams['add'] = $calc->addNumbers($number1, $number2);
        }
        if (in_array("sub", $operationType)) {
            $templateParams['sub'] = $calc->subNumbers($number1, $number2);
        }
        if (in_array("multip", $operationType)) {
            $templateParams['multip'] = $calc->multipNumbers($number1, $number2);
        }
        if (in_array("divide", $operationType)) {
            $templateParams['divide'] = $calc->divideNumbers($number1, $number2);
        }
        $templateParams ['countOperation'] = $calc->getCountOperation();

        echo $template->render($templateParams);
    }
}


