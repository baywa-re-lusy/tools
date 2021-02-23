<?php
/**
 * RabbitMqAdapterFactory.php
 *
 * @date      22.02.2021
 * @author    Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file      RabbitMqAdapterFactory.php
 * @copyright Copyright (c) BayWa r.e. - All rights reserved
 * @license   Unauthorized copying of this source code, via any medium is strictly
 *            prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue\Adapter;

use Aws\Sqs\SqsClient;
use BayWaReLusy\Tools\ToolsConfig;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class AwsSqsAdapterFactory
 *
 * @package     BayWaReLusy
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 *
 * @codeCoverageIgnore
 */
class RabbitMqAdapterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ToolsConfig $config */
        $config = $container->get(ToolsConfig::class);

        $connection = new AMQPStreamConnection(
            $config->getRabbitMqHost(),
            $config->getRabbitMqPort(),
            $config->getRabbitMqUser(),
            $config->getRabbitMqPassword()
        );

        return new RabbitMqAdapter($connection, $connection->channel());
    }
}
