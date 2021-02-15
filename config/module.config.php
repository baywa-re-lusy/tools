<?php

use BayWaReLusy\Tools\Queue\QueueService;
use BayWaReLusy\Tools\Queue\QueueServiceFactory;
use BayWaReLusy\Tools\Queue\Adapter\AsqAdapter;
use BayWaReLusy\Tools\Queue\Adapter\AsqAdapterFactory;

return [
    'service_manager' =>
        [
            'invokables' =>
                [
                ],
            'factories' =>
                [
                    QueueService::class => QueueServiceFactory::class,
                    AsqAdapter::class   => AsqAdapterFactory::class,
                ],
            'abstract_factories' =>
                [
                ],
            'initializers' =>
                [
                ],
            'shared' =>
                [
                ]
        ]
];
