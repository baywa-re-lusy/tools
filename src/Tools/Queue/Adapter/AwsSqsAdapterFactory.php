<?php
/**
 * AwsSqsAdapterFactory.php
 *
 * @date      16.02.2021
 * @author    Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file      AwsSqsAdapterFactory.php
 * @copyright Copyright (c) BayWa r.e. - All rights reserved
 * @license   Unauthorized copying of this source code, via any medium is strictly
 *            prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue\Adapter;

use Aws\Sqs\SqsClient;
use BayWaReLusy\Tools\ToolsConfig;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

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
class AwsSqsAdapterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ToolsConfig $config */
        $config = $container->get(ToolsConfig::class);

        $parameters = array_merge(
            ['version' => '2012-11-05'],
            [
                'region'      => $config->getAwsRegion(),
                'credentials' =>
                    [
                        'key'    => $config->getAwsKey(),
                        'secret' => $config->getAwsSecret()
                    ]
            ]
        );

        return new AwsSqsAdapter(new SqsClient($parameters));
    }
}
