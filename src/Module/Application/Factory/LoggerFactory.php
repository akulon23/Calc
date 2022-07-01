<?php

namespace Application\Factory;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Klasa tworzaca logger.
 * Class LoggerFactory
 * @package Application\Factory
 */
class LoggerFactory
{
    /** @var LoggerInterface */
    private $logger;

    public function __construct()
    {
        $this->logger = new Logger('APP');
        $this->logger->pushHandler(
            new StreamHandler(PROJECT_DIR . '/var/logs/app.log', LogLevel::INFO)
        );
    }

    /**
     * Metoda zwracająca logger.
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}