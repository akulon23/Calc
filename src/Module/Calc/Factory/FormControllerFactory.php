<?php
namespace Calc\Factory;

use Application\Helpers\Params;
use Application\TemplateEngine;
use Calc\Controller\FormController;
use Psr\Container\ContainerInterface;

class FormControllerFactory
{
  public function __invoke(ContainerInterface $container){
      return new FormController($container->get(Params::class), $container->get(TemplateEngine::class));
  }
}