<?php
/**
 * ToolsConfig.php
 *
 * @date        16.02.2021
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file        ToolsConfig.php
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools;

/**
 * Class ToolsConfig
 *
 * Config object for Tools
 *
 * @package     BayWaReLusy
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */
class ToolsConfig
{
    protected ?string $awsRegion;
    protected ?string $awsKey;
    protected ?string $awsSecret;
    protected ?string $azureStorageAccountConnectionString;
    protected ?string $azureServiceBusConnectionString;
    protected ?string $publisherKey;
    protected ?string $subscriberKey;

    /**
     * ToolsConfig constructor.
     * @param string|null $awsRegion
     * @param string|null $awsKey
     * @param string|null $awsSecret
     * @param string|null $azureStorageAccountConnectionString
     * @param string|null $azureServiceBusConnectionString
     * @param string|null $publisherKey
     * @param string|null $subscriberKey
     */
    public function __construct(
        string $awsRegion = null,
        string $awsKey = null,
        string $awsSecret = null,
        string $azureStorageAccountConnectionString = null,
        string $azureServiceBusConnectionString = null,
        string $publisherKey = null,
        string $subscriberKey = null
    ) {
        $this->awsRegion                           = $awsRegion;
        $this->awsKey                              = $awsKey;
        $this->awsSecret                           = $awsSecret;
        $this->azureStorageAccountConnectionString = $azureStorageAccountConnectionString;
        $this->azureServiceBusConnectionString     = $azureServiceBusConnectionString;
        $this->publisherKey                        = $publisherKey;
        $this->subscriberKey                       = $subscriberKey;
    }

    /**
     * @return string|null
     */
    public function getAwsRegion(): ?string
    {
        return $this->awsRegion;
    }

    /**
     * @return string|null
     */
    public function getAwsKey(): ?string
    {
        return $this->awsKey;
    }

    /**
     * @return string|null
     */
    public function getAwsSecret(): ?string
    {
        return $this->awsSecret;
    }

    /**
     * @return string|null
     */
    public function getAzureStorageAccountConnectionString(): ?string
    {
        return $this->azureStorageAccountConnectionString;
    }

    /**
     * @return string|null
     */
    public function getAzureServiceBusConnectionString(): ?string
    {
        return $this->azureServiceBusConnectionString;
    }

    /**
     * @return string|null
     */
    public function getPublisherKey(): ?string
    {
        return $this->publisherKey;
    }

    /**
     * @return string|null
     */
    public function getSubscriberKey(): ?string
    {
        return $this->subscriberKey;
    }
}
