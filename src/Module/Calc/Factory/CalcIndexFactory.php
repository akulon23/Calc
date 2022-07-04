<?php
namespace Calc\Factory;

use Application\Helpers\Params;
use Application\TemplateEngine;
use Calc\Controller\CalcIndex;
use Psr\Container\ContainerInterface;

class CalcIndexFactory
{
  public function __invoke(ContainerInterface $container){
      return new CalcIndex($container->get(Params::class),$container->get(TemplateEngine::class));
  }
}