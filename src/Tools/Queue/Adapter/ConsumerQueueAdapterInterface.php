<?php
/**
 * ConsumerQueueAdapterInterface.php
 *
 * @date      22.02.2021
 * @author    Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file      ConsumerQueueAdapterInterface.php
 * @copyright Copyright (c) BayWa r.e. - All rights reserved
 * @license   Unauthorized copying of this source code, via any medium is strictly
 *            prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue\Adapter;

use BayWaReLusy\Tools\Queue\Message;

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
interface ConsumerQueueAdapterInterface extends QueueAdapterInterface
{
    /**
     * Start consuming messages in the queue.
     *
     * @param string $queueUrl
     * @param callable $messageHandler A function or method accepting a BayWaReLusy\Tools\Queue\Message as parameter
     */
    public function consume(string $queueUrl, callable $messageHandler): void;
}
