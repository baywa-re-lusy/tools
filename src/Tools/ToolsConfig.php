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
    protected ?string $rabbitMqHost;
    protected ?string $rabbitMqPort;
    protected ?string $rabbitMqUser;
    protected ?string $rabbitMqPassword;
    protected ?string $awsRegion;
    protected ?string $awsKey;
    protected ?string $awsSecret;
    protected ?string $publisherKey;
    protected ?string $subscriberKey;

    /**
     * ToolsConfig constructor.
     * @param string|null $rabbitMqHost
     * @param string|null $rabbitMqPort
     * @param string|null $rabbitMqUser
     * @param string|null $rabbitMqPassword
     * @param string|null $awsRegion
     * @param string|null $awsKey
     * @param string|null $awsSecret
     * @param string|null $publisherKey
     * @param string|null $subscriberKey
     */
    public function __construct(
        string $rabbitMqHost = null,
        string $rabbitMqPort = null,
        string $rabbitMqUser = null,
        string $rabbitMqPassword = null,
        string $awsRegion = null,
        string $awsKey = null,
        string $awsSecret = null,
        string $publisherKey = null,
        string $subscriberKey = null
    ) {
        $this->rabbitMqHost     = $rabbitMqHost;
        $this->rabbitMqPort     = $rabbitMqPort;
        $this->rabbitMqUser     = $rabbitMqUser;
        $this->rabbitMqPassword = $rabbitMqPassword;
        $this->awsRegion        = $awsRegion;
        $this->awsKey           = $awsKey;
        $this->awsSecret        = $awsSecret;
        $this->publisherKey     = $publisherKey;
        $this->subscriberKey    = $subscriberKey;
    }

    /**
     * @return string|null
     */
    public function getRabbitMqHost(): ?string
    {
        return $this->rabbitMqHost;
    }

    /**
     * @return string|null
     */
    public function getRabbitMqPort(): ?string
    {
        return $this->rabbitMqPort;
    }

    /**
     * @return string|null
     */
    public function getRabbitMqUser(): ?string
    {
        return $this->rabbitMqUser;
    }

    /**
     * @return string|null
     */
    public function getRabbitMqPassword(): ?string
    {
        return $this->rabbitMqPassword;
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
