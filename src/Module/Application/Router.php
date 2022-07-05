<?php


namespace Application;


use Application\Controller\ControllerInterface;
use Application\Helpers\Params;
use Exception;
use Psr\Container\ContainerInterface;

class Router
{
    private ContainerInterface $serviceManager;
    private array $configController;
    private Params $params;

    public function __construct(
        array $configController,
        ContainerInterface $serviceManager,
        Params $params
    ) {
        $this->configController = $configController;
        $this->serviceManager = $serviceManager;
        $this->params = $params;
    }

    public function router()
    {
        $id = $this->params->getParam('id', 'default');

        if (array_key_exists($id, $this->configController)) {
            /** @var ControllerInterface $controller */
            $controller = $this->serviceManager->get($this->configController[$id]);
            return $controller->index();
        }
        throw new Exception('Nie ma takiej ścieżki');
    }
}
