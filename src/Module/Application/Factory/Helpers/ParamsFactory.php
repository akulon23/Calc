<?php

namespace Application\Factory\Helpers;


use Application\Helpers\Params;
use Psr\Container\ContainerInterface;

class ParamsFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new Params();
    }
}