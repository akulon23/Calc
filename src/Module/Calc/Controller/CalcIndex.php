<?php

namespace Calc\Controller;


use Calc\Calc;
use Calc\CalcData;
use Calc\CalcSaveDataFile;

class CalcIndex
{
    private $params;
    private $templateEngine;

    public function __construct($params, $templateEngine)
    {
        $this->params = $params;
        $this->templateEngine = $templateEngine;
    }

    public function index()
    {
        // Pobranie zmiennych z formularza
        $number1 = $this->params->getPostParam('number1', 0);
        $number2 = $this->params->getPostParam('number2', 0);
        $operationType = $this->params->getPostParam('operation-type', []);
        $userName = $this->params->getPostParam('userName', '');


        $calc = new Calc(
            new CalcData($number1, $number2, $userName),
            new CalcSaveDataFile()
        );


        $templateParams = [
            'number1' => $number1,
            'number2' => $number2,
            'userName' => $userName,
        ];

        if (in_array("add", $operationType)) {
            $templateParams['add'] = $calc->addNumbers();
        }
        if (in_array("sub", $operationType)) {
            $templateParams['sub'] = $calc->subNumbers();
        }
        if (in_array("multip", $operationType)) {
            $templateParams['multip'] = $calc->multipNumbers();
        }
        if (in_array("divide", $operationType)) {
            $templateParams['divide'] = $calc->divideNumbers();
        }
        $templateParams ['countOperation'] = $calc->getCountOperation();

        $this->templateEngine->render('calcForm.twig', $templateParams);
    }

}