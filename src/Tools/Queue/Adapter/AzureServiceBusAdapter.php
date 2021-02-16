<?php
/**
 * AzureStorageQueueAdapter.php
 *
 * @date      16.02.2021
 * @author    Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file      AzureStorageQueueAdapter.php
 * @copyright Copyright (c) BayWa r.e. - All rights reserved
 * @license   Unauthorized copying of this source code, via any medium is strictly
 *            prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue\Adapter;

use BayWaReLusy\Tools\Queue\Message;
use BayWaReLusy\Tools\Queue\QueueException;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\ServiceBusRestProxy as AzureServiceBusClient;

/**
 * AzureStorageQueueAdapter
 *
 * @package    Tools
 * @subpackage Service
 * @author     Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright  Copyright (c) BayWa r.e. - All rights reserved
 * @license    Unauthorized copying of this source code, via any medium is strictly
 *             prohibited, proprietary and confidential.
 */
class AzureServiceBusAdapter implements AdapterInterface
{
    protected AzureServiceBusClient $asbClient;

    /**
     * AzureServiceBusAdapter constructor.
     * @param AzureServiceBusClient $asbClient
     */
    public function __construct(AzureServiceBusClient $asbClient)
    {
        $this->asbClient = $asbClient;
    }

    /**
     * @inheritdoc
     */
    public function sendMessage(
        string $queueUrl,
        string $messageBody,
        string $messageGroupId = null,
        string $messageDeduplicationId = null
    ): AdapterInterface {
        try    {
            $message = new BrokeredMessage();
            $message->setBody($messageBody);
            $this->asbClient->sendQueueMessage($queueUrl, $message);
        }
        catch (ServiceException $e) {
            throw new QueueException($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @inheritdoc
     */
    public function receiveMessage(string $queueUrl): ?Message
    {
        return new Message();
    }

    /**
     * @inheritdoc
     */
    public function deleteMessage(string $queueUrl, Message $message): AdapterInterface
    {
        return $this;
    }
}
