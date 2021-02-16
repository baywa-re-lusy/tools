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
    protected string $azureStorageAccountConnectionString;
    protected string $azureServiceBusConnectionString;
    protected string $publisherKey;
    protected string $subscriberKey;

    /**
     * @return string
     */
    public function getAzureStorageAccountConnectionString(): string
    {
        return $this->azureStorageAccountConnectionString;
    }

    /**
     * @param string $azureStorageAccountConnectionString
     * @return ToolsConfig
     */
    public function setAzureStorageAccountConnectionString(string $azureStorageAccountConnectionString): ToolsConfig
    {
        $this->azureStorageAccountConnectionString = $azureStorageAccountConnectionString;
        return $this;
    }

    /**
     * @return string
     */
    public function getAzureServiceBusConnectionString(): string
    {
        return $this->azureServiceBusConnectionString;
    }

    /**
     * @param string $azureServiceBusConnectionString
     * @return ToolsConfig
     */
    public function setAzureServiceBusConnectionString(string $azureServiceBusConnectionString): ToolsConfig
    {
        $this->azureServiceBusConnectionString = $azureServiceBusConnectionString;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublisherKey(): string
    {
        return $this->publisherKey;
    }

    /**
     * @param string $publisherKey
     * @return ToolsConfig
     */
    public function setPublisherKey(string $publisherKey): ToolsConfig
    {
        $this->publisherKey = $publisherKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriberKey(): string
    {
        return $this->subscriberKey;
    }

    /**
     * @param string $subscriberKey
     * @return ToolsConfig
     */
    public function setSubscriberKey(string $subscriberKey): ToolsConfig
    {
        $this->subscriberKey = $subscriberKey;
        return $this;
    }
}
