<?php

namespace Application\Factory\Controller;

use Application\Controller\DefaultController;
use Application\TemplateEngine;
use Psr\Container\ContainerInterface;

class DefaultControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
       return new DefaultController($container->get(TemplateEngine::class));
    }
}