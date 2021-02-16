<?php

use BayWaReLusy\Tools\Queue\QueueService;
use BayWaReLusy\Tools\Queue\Adapter\AzureStorageQueueAdapter;
use BayWaReLusy\Tools\Queue\Adapter\AzureStorageQueueAdapterFactory;
use BayWaReLusy\Tools\Queue\Adapter\AzureServiceBusAdapter;
use BayWaReLusy\Tools\Queue\Adapter\AzureServiceBusAdapterFactory;
use BayWaReLusy\Tools\Queue\Adapter\AwsSqsAdapter;
use BayWaReLusy\Tools\Queue\Adapter\AwsSqsAdapterFactory;

return [
    'service_manager' =>
        [
            'invokables' =>
                [
                    QueueService::class
                ],
            'factories' =>
                [
                    AwsSqsAdapter::class            => AwsSqsAdapterFactory::class,
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
