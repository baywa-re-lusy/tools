<?php
/**
 * QueueService.php
 *
 * @date      16.02.2021
 * @author    Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file      QueueService.php
 * @copyright Copyright (c) BayWa r.e. - All rights reserved
 * @license   Unauthorized copying of this source code, via any medium is strictly
 *            prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue;

use BayWaReLusy\Tools\LoggerAwareInterface;
use BayWaReLusy\Tools\LoggerAwareTrait;
use BayWaReLusy\Tools\Queue\Adapter\ConsumerQueueAdapterInterface;
use BayWaReLusy\Tools\Queue\Adapter\PollingQueueAdapterInterface;
use BayWaReLusy\Tools\Queue\Adapter\QueueAdapterInterface;

/**
 * Class QueueService
 *
 * @package     BayWaReLusy
 * @subpackage  Tools
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */
class QueueService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    protected QueueAdapterInterface $adapter;

    /**
     * Set the adapter.
     *
     * @param QueueAdapterInterface $adapter The adapter.
     * @return $this Provides a fluent interface.
     */
    public function setAdapter(QueueAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        return $this;
    }

    /**
     * Return the adapter.
     *
     * @return QueueAdapterInterface The adapter.
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Send a message.
     *
     * @param string $queueUrl
     * @param string $messageBody
     * @param string|null $messageGroupId In case of a FIFO queue, messages can be grouped
     * @param string|null $messageDeduplicationId In case of a FIFO queue, a deduplication ID can be provided
     * @return QueueService Fluent interface
     */
    public function sendMessage(
        string $queueUrl,
        string $messageBody,
        string $messageGroupId = null,
        string $messageDeduplicationId = null
    ) {
        if ($this->getLogger()) {
            $this->getLogger()->info(
                date_create()->format('[c] ') . "Sending a message on $queueUrl ..."
            );
        }

        $this->getAdapter()->sendMessage($queueUrl, $messageBody, $messageGroupId, $messageDeduplicationId);

        return $this;
    }

    /**
     * Receive a message from the given queue.
     *
     * @param string $queueUrl
     * @return Message|null
     * @throws \Exception
     */
    public function receiveMessage(string $queueUrl): ?Message
    {
        if ($this->getLogger()) {
            $this->getLogger()->info(
                date_create()->format('[c] ') . "Checking queue for messages on $queueUrl ..."
            );
        }

        $adapter = $this->getAdapter();

        if ($adapter instanceof PollingQueueAdapterInterface) {
            return $adapter->receiveMessage($queueUrl);
        }

        throw new \Exception(sprintf("The queue '%s' is not a polling-type queue.", $queueUrl));
    }

    /**
     * Consume messages in the given queue.
     *
     * @param string $queueUrl
     * @param callable $messageHandler
     * @throws \Exception
     */
    public function consume(string $queueUrl, callable $messageHandler): void
    {
        if ($this->getLogger()) {
            $this->getLogger()->writeLine(
                date_create()->format('[c] ') . "Start consuming messages on queue $queueUrl ..."
            );
        }

        $adapter = $this->getAdapter();

        if ($adapter instanceof ConsumerQueueAdapterInterface) {
            $adapter->consume($queueUrl, $messageHandler);
        }

        throw new \Exception(sprintf("The queue '%s' is not a consumer-type queue.", $queueUrl));
    }

    /**
     * Delete the given message.
     *
     * @param string $queueUrl
     * @param Message $message
     * @return QueueService Fluent interface
     */
    public function deleteMessage(string $queueUrl, Message $message)
    {
        if ($this->getLogger()) {
            $this->getLogger()->writeLine(
                sprintf(
                    "[%s] Deleting message %s on queue %s ...",
                    date_create()->format('c'),
                    $message->getReceiptHandle(),
                    $queueUrl
                )
            );
        }

        $this->getAdapter()->deleteMessage($queueUrl, $message);

        return $this;
    }
}
