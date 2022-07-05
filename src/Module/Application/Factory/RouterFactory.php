<?php


namespace Application\Factory;


use Application\Controller\DefaultController;
use Application\Helpers\Params;
use Application\Router;
use Calc\Controller\CalcIndex;
use Psr\Container\ContainerInterface;

class RouterFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new Router(
            [
                'calcForm' => CalcIndex::class,
                'default' => DefaultController::class,
            ],
            $container,
            $container->get(Params::class),
        );
    }
}