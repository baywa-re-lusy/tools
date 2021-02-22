<?php
/**
 * QueueAdapterInterface.php
 *
 * @date      16.02.2021
 * @author    Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file      QueueAdapterInterface.php
 * @copyright Copyright (c) BayWa r.e. - All rights reserved
 * @license   Unauthorized copying of this source code, via any medium is strictly
 *            prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue\Adapter;

use BayWaReLusy\Tools\Queue\Message;
use BayWaReLusy\Tools\Queue\QueueException;

/**
 * QueueAdapterInterface
 *
 * @package     BayWaReLusy
 * @subpackage  Tools
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */
interface QueueAdapterInterface
{
    /**
     * Send a message.
     *
     * @param string $queueUrl
     * @param string $messageBody
     * @param ?string $messageGroupId In case of a FIFO queue, messages can be grouped
     * @param ?string $messageDeduplicationId In case of a FIFO queue, a deduplication ID can be provided
     * @return $this
     * @throws QueueException
     */
    public function sendMessage(
        string $queueUrl,
        string $messageBody,
        string $messageGroupId = null,
        string $messageDeduplicationId = null
    ): QueueAdapterInterface;

    /**
     * @param string $queueUrl
     * @param Message $message
     * @return $this
     */
    public function deleteMessage(string $queueUrl, Message $message): QueueAdapterInterface;
}
