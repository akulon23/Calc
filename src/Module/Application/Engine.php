<?php

namespace Application;

use Application\Factory\LoggerFactory;
use Application\Helpers\Params;
use Calc\Calc;
use Psr\Log\LoggerInterface;

class Engine
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var TemplateEngine
     */
    private $templateEngine;

    /**
     * @var Params
     */
    private $params;

    /**
     * Engine constructor
     */
    public function __construct()
    {
        $loggerFactory = new LoggerFactory();
        $this->logger = $loggerFactory->getLogger();

        $this->params = new Params();
        $this->templateEngine = new TemplateEngine(__DIR__ . '/Views');
    }

    public function start()
    {
        $this->logger->info('application is running');
        $this->executionCalc();
    }

    private function executionCalc()
    {
        // Pobranie zmiennych z formularza
        $number1 = $this->params->getPostParam('number1', 0);
        $number2 = $this->params->getPostParam('number2', 0);
        $operationType = $this->params->getPostParam('operation-type', []);

        $calc = new Calc();

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

        $this->templateEngine->render('calcForm.twig', $templateParams);
    }

}


