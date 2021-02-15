<?php

return [
    'service_manager' =>
        [
            'invokables' =>
                [
                ],
            'factories' =>
                [
                    'queue'             => \BayWaReLusy\Tools\Queue\QueueServiceFactory::class,
                    'queue.adapter.asq' => \BayWaReLusy\Tools\Queue\Adapter\AsqAdapterFactory::class,
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
