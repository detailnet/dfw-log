<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
        ),
        'invokables' => array(
        ),
        'factories' => array(
            'Detail\Log\Options\ModuleOptions' => 'Detail\Log\Factory\Options\ModuleOptionsFactory',
        ),
        'initializers' => array(
            'Detail\Log\Service\LoggerInitializer',
        ),
    ),
    'controllers' => array(
        'initializers' => array(
            'Detail\Log\Service\LoggerInitializer',
        ),
    ),
    'detail_log' => array(
        'logger' => 'Monolog\Logger',
    ),
);
