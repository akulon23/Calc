<?php

namespace Application;

use Application\Factory\LoggerFactory;
use Application\Helpers\Params;
use Calc\Calc;
use Calc\CalcData;
use Calc\CalcSaveDataFile;
use Calc\Exception\WrongNumberException;
use Exception;
use Psr\Log\LoggerInterface;
use Throwable;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

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
     * Inicjalizacja wlasciwosci klasy
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
        try {
            $this->executionCalc();
        } catch (Exception $exception) {
            $this->logger->critical(
                $exception->getMessage(),
                [
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'trace' => $exception->getTrace(),
                ]
            );

            $this->templateEngine->render('layout.twig', ['errorMessage' => $exception->getMessage(),]);
        } catch (Throwable $exception) {
            $this->logger->critical(
                $exception->getMessage(),
                [
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'trace' => $exception->getTrace(),
                ]
            );
        }
    }

    /**
     * @throws WrongNumberException
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    private function executionCalc()
    {
        // Pobranie zmiennych z formularza
        $number1 = $this->params->getPostParam('number1', 0);
        $number2 = $this->params->getPostParam('number2', 0);
        $operationType = $this->params->getPostParam('operation-type', []);
        $userName = $this->params->getPostParam('userName', '');


        $calc = new Calc(
            new CalcData($number1, $number2, $userName),
            new CalcSaveDataFile(

            )
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


