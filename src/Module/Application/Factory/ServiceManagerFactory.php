<?php

namespace Application\Factory;


use Application\Controller\DefaultController;
use Application\Factory\Controller\DefaultControllerFactory;
use Application\Factory\Helpers\ParamsFactory;
use Application\Helpers\Params;
use Application\Router;
use Application\TemplateEngine;
use Calc\Controller\FormController;
use Calc\Factory\FormControllerFactory;
use Laminas\ServiceManager\ServiceManager;
use Psr\Log\LoggerInterface;

class ServiceManagerFactory
{
    private $serviceManager;

    public function __construct()
    {
        $this->serviceManager = new ServiceManager(
            [
                'factories' => [
                    TemplateEngine::class => TemplateEngineFactory::class,
                    FormController::class => FormControllerFactory::class,
                    Params::class => ParamsFactory::class,
                    LoggerInterface::class => LoggerFactory::class,
                    Router::class=>RouterFactory::class,
                    DefaultController::class=>DefaultControllerFactory::class,
                ],
            ]
        );
    }

    /**
     * @return ServiceManager
     */
    public function getServiceMenager(): ServiceManager
    {
        return $this->serviceManager;
    }


}