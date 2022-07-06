<?php

namespace Application\Factory;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Class creating a logger.
 * Class LoggerFactory
 * @package Application\Factory
 */
class LoggerFactory
{
    public function __invoke(): LoggerInterface
    {
        $logger = new Logger('APP');
        $logger->pushHandler(
            new StreamHandler(PROJECT_DIR . '/var/logs/app.log', LogLevel::INFO)
        );

        return $logger;
    }
}