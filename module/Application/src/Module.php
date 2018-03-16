<?php

namespace Application;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\ChaleTable::class => function($container) {
                    $tableGateway = $container->get(Model\ChaleTableGateway::class);
                    return new Model\ChaleTable($tableGateway);
                },
                Model\ChaleTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Chale());
                    return new TableGateway('chale', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\ChaleController::class => function($container) {
                    return new Controller\ChaleController(
                        $container->get(Model\ChaleTable::class)
                    );
                },
            ],
        ];
    }
}
