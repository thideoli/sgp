<?php

namespace Application;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/api[/]',
                    'defaults' => [
                        'controller' => Controller\APIController::class,
                        'action' => 'status'
                    ],
                ],
            ],
            'chale' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/api/chales[/:id][/]',
                    'defaults' => [
                        'controller' => Controller\ChaleController::class
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\APIController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];