<?php

namespace Application;

use Application\Factory\ServiceMenagerFactory;
use Calc\Controller\CalcIndex;
use Exception;
use Psr\Log\LoggerInterface;
use Throwable;


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


    private $serviceMenager;


    /**
     * Inicjalizacja wlasciwosci klasy
     */
    public function __construct()
    {
        $this->serviceMenager = (new ServiceMenagerFactory())->getServiceMenager();
        $this->templateEngine = $this->serviceMenager->get(TemplateEngine::class);
        $this->logger = $this->serviceMenager->get(LoggerInterface::class);
    }

    public function start()
    {
        $this->logger->info('application is running');
        try {
            $calcController = $this->serviceMenager->get(CalcIndex::class);
            $calcController->index();
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


}


