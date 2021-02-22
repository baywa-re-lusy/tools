<?php
/**
 * AwsSqsAdapter.php
 *
 * @date      16.02.2021
 * @author    Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file      AwsSqsAdapter.php
 * @copyright Copyright (c) BayWa r.e. - All rights reserved
 * @license   Unauthorized copying of this source code, via any medium is strictly
 *            prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue\Adapter;

use BayWaReLusy\Tools\Queue\Message;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * AwsSqsAdapter
 *
 * @package    BayWaReLusy
 * @author     Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright  Copyright (c) BayWa r.e. - All rights reserved
 * @license    Unauthorized copying of this source code, via any medium is strictly
 *             prohibited, proprietary and confidential.
 */
class RabbitMqAdapter implements ConsumerQueueAdapterInterface
{
    protected AMQPStreamConnection $connection;

    /**
     * RabbitMqAdapter constructor.
     * @param AMQPStreamConnection $connection
     */
    public function __construct(AMQPStreamConnection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @inheritdoc
     */
    public function sendMessage(
        string $queueUrl,
        string $messageBody,
        string $messageGroupId = null,
        string $messageDeduplicationId = null
    ): QueueAdapterInterface {
    }

    /**
     * @inheritdoc
     */
    public function consume(string $queueUrl, callable $messageHandler): ?Message
    {
        $callback = function (AMQPMessage $msg) use ($messageHandler) {
            $messageHandler($msg->getBody());
            $msg->ack();
        };

        $channel = $this->connection->channel();
        $channel->queue_declare($queueUrl, false, true, false, false);
        $channel->basic_qos(null, 1, null);
        $channel->basic_consume($queueUrl, '', false, false, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $this->connection->close();
    }

    /**
     * @inheritdoc
     */
    public function deleteMessage(string $queueUrl, Message $message): QueueAdapterInterface
    {
    }
}
