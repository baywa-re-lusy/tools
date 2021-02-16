<?php

use BayWaReLusy\Tools\Queue\QueueService;
use BayWaReLusy\Tools\Queue\QueueServiceFactory;
use BayWaReLusy\Tools\Queue\Adapter\AzureStorageQueueAdapter;
use BayWaReLusy\Tools\Queue\Adapter\AzureStorageQueueAdapterFactory;
use BayWaReLusy\Tools\Queue\Adapter\AzureServiceBusAdapter;
use BayWaReLusy\Tools\Queue\Adapter\AzureServiceBusAdapterFactory;

return [
    'service_manager' =>
        [
            'invokables' =>
                [
                ],
            'factories' =>
                [
                    QueueService::class             => QueueServiceFactory::class,
                    AzureStorageQueueAdapter::class => AzureStorageQueueAdapterFactory::class,
                    AzureServiceBusAdapter::class   => AzureServiceBusAdapterFactory::class,
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
