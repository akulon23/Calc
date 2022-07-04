<?php

namespace Application\Factory;


use Application\Factory\Helpers\ParamsFactory;
use Application\Helpers\Params;
use Application\Router;
use Application\TemplateEngine;
use Calc\Controller\CalcIndex;
use Calc\Factory\CalcIndexFactory;
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
                    CalcIndex::class => CalcIndexFactory::class,
                    Params::class => ParamsFactory::class,
                    LoggerInterface::class => LoggerFactory::class,
                    Router::class=>RouterFactory::class,
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