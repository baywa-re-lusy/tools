<?php
/**
 * AsqAdapterFactory.php
 *
 * @date        26.02.2018
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file        AsqAdapterFactory.php
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue\Adapter;

use Aws\Sqs\SqsClient;
use BayWaReLusy\Tools\ToolsConfig;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use MicrosoftAzure\Storage\Queue\QueueRestProxy;

/**
 * Class AsqAdapterFactory
 *
 * @package     BayWaReLusy
 * @subpackage  Tools
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 *
 * @codeCoverageIgnore
 */
class AsqAdapterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ToolsConfig $toolsConfig */
        $toolsConfig = $container->get(ToolsConfig::class);

        $asqClient = QueueRestProxy::createQueueService($toolsConfig->getAzureStorageAccountConnectionString());

        return new \BayWaReLusy\Tools\Queue\Adapter\AsqAdapter($asqClient);
    }
}
