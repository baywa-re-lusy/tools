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

use BayWaReLusy\Tools\ConsoleAwareInterface;
use BayWaReLusy\Tools\ConsoleAwareTrait;
use BayWaReLusy\Tools\Queue\Adapter\AdapterInterface;
use Laminas\Console\ColorInterface;

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
class QueueService implements ConsoleAwareInterface
{
    use ConsoleAwareTrait;

    protected AdapterInterface $adapter;

    /**
     * Set the adapter.
     *
     * @param AdapterInterface $adapter The adapter.
     * @return $this Provides a fluent interface.
     */
    public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        return $this;
    }

    /**
     * Return the adapter.
     *
     * @return AdapterInterface The adapter.
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
        // Check first if we are running in a console
        if ($this->getConsole()) {
            $this->getConsole()->writeLine(
                date_create()->format('[c] ') . "Sending a message on $queueUrl ...",
                ColorInterface::LIGHT_GREEN
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
     */
    public function receiveMessage(string $queueUrl)
    {
        // Check first if we are running in a console
        if ($this->getConsole()) {
            $this->getConsole()->writeLine(
                date_create()->format('[c] ') . "Checking queue for messages on $queueUrl ...",
                ColorInterface::WHITE
            );
        }

        return $this->getAdapter()->receiveMessage($queueUrl);
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
        // Check first if we are running in a console
        if ($this->getConsole()) {
            $this->getConsole()->writeLine(
                sprintf(
                    "[%s] Deleting message %s on queue %s ...",
                    date_create()->format('c'),
                    $message->getReceiptHandle(),
                    $queueUrl
                ),
                ColorInterface::LIGHT_GREEN
            );
        }

        $this->getAdapter()->deleteMessage($queueUrl, $message);

        return $this;
    }
}
