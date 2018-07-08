<?php

namespace Reminder;

// Add these import statements:
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;


class Module implements ConfigProviderInterface {

 public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\ReminderTable::class => function($container) {
                    $tableGateway = $container->get(Model\ReminderTableGateway::class);
                    return new Model\ReminderTable($tableGateway);
                },
                Model\ReminderTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Reminder());
                    return new TableGateway('reminder', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

       public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\ReminderController::class => function($container) {
                    return new Controller\ReminderController(
                        $container->get(Model\ReminderTable::class)
                    );
                },
            ],
        ];
    }

 

}

