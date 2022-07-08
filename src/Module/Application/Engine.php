<?php

namespace Application;

use Application\Factory\ServiceManagerFactory;
use Exception;
use Laminas\ServiceManager\ServiceManager;
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

    /**
     * @var ServiceManager
     */
    private $serviceManager;
    /**
     * @var Router
     */
    private $router;


    /**
     * Initialization of class properties
     */
    public function __construct()
    {
        $this->serviceManager = (new ServiceManagerFactory())->getServiceManager();
        $this->templateEngine = $this->serviceManager->get(TemplateEngine::class);
        $this->logger = $this->serviceManager->get(LoggerInterface::class);
        $this->router = $this->serviceManager->get(Router::class);
    }

    public function start()
    {
        $this->logger->info('application is running');
        try {
            $this->router->router();
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


