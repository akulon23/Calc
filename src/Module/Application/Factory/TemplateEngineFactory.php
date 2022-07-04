<?php


namespace Application\Factory;


use Application\TemplateEngine;
use Psr\Container\ContainerInterface;

class TemplateEngineFactory
{
    public function __invoke(ContainerInterface $container, $requestedName)
    {
        return new TemplateEngine(PROJECT_DIR . '/src/Module/Application/Views');
    }
}
