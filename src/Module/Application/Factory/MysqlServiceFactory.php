<?php


namespace Application\Factory;


use Application\MysqlService;
use Psr\Container\ContainerInterface;

class MysqlServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new MysqlService(
            'localhost',
            'test',
            'test',
            'test'
        );
    }
}