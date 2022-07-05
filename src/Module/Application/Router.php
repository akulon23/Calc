<?php


namespace Application;


use Application\Controller\ControllerInterface;
use Application\Helpers\Params;
use Exception;
use Psr\Container\ContainerInterface;

class Router
{
    private ContainerInterface $serviceManager;
    private array $config;
    private Params $params;

    public function __construct(
        array $config,
        ContainerInterface $serviceManager,
        Params $params
    ) {
        $this->config = $config;
        $this->serviceManager = $serviceManager;
        $this->params = $params;
    }

    public function router()
    {
        $id = $this->params->getParam('id', 'default');

        if (array_key_exists($id, $this->config)) {
            /** @var ControllerInterface $controller */
            $controller = $this->serviceManager->get($this->config[$id]);
            return $controller->index();
        }
        throw new Exception('Nie ma takiej ścieżki');
    }
}
