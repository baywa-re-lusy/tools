<?php

use BayWaReLusy\Tools\Queue\QueueService;
use BayWaReLusy\Tools\Queue\Adapter\AwsSqsAdapter;
use BayWaReLusy\Tools\Queue\Adapter\AwsSqsAdapterFactory;
use BayWaReLusy\Tools\Queue\Adapter\RabbitMqAdapter;
use BayWaReLusy\Tools\Queue\Adapter\RabbitMqAdapterFactory;

return [
    'service_manager' =>
        [
            'invokables' =>
                [
                    QueueService::class
                ],
            'factories' =>
                [
                    AwsSqsAdapter::class   => AwsSqsAdapterFactory::class,
                    RabbitMqAdapter::class => RabbitMqAdapterFactory::class,
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
