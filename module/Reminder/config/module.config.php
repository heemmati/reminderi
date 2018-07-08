<?php
namespace Reminder;

use Zend\Router\Http\Segment;


return [
    'controllers' => [
        'factories' => [
            Controller\ReminderController::class => InvokableFactory::class,
        ],
    ],
    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'reminder' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/reminder[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ReminderController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'reminder' => __DIR__ . '/../view',
        ],
    ],
];