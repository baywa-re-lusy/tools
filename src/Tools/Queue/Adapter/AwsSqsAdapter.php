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

use Aws\Sqs\SqsClient;
use BayWaReLusy\Tools\Queue\Message;

/**
 * AwsSqsAdapter
 *
 * @package    BayWaReLusy
 * @author     Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright  Copyright (c) BayWa r.e. - All rights reserved
 * @license    Unauthorized copying of this source code, via any medium is strictly
 *             prohibited, proprietary and confidential.
 */
class AwsSqsAdapter implements AdapterInterface
{
    protected SqsClient $sqsClient;

    /**
     * AwsSqsAdapter constructor.
     * @param SqsClient $sqsClient
     */
    public function __construct(SqsClient $sqsClient)
    {
        $this->sqsClient = $sqsClient;
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
        $params =
            [
                'QueueUrl'    => $queueUrl,
                'MessageBody' => $messageBody,
            ];

        if ($messageGroupId) {
            $params['MessageGroupId'] = $messageGroupId;
        }

        if ($messageDeduplicationId) {
            $params['MessageDeduplicationId'] = $messageDeduplicationId;
        }

        $this->sqsClient->sendMessage($params);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function receiveMessage(string $queueUrl): ?Message
    {
        $result = $this->sqsClient->receiveMessage(['QueueUrl' => $queueUrl]);

        if (!empty($result['Messages'])) {
            // By default, only one message will be returned
            foreach ($result['Messages'] as $message) {
                $newMessage = new Message();
                $newMessage
                    ->setBody($message['Body'])
                    ->setReceiptHandle($message['ReceiptHandle']);
                return $newMessage;
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function deleteMessage(string $queueUrl, Message $message): AdapterInterface
    {
        $this->sqsClient->deleteMessage([
            'QueueUrl'      => $queueUrl,
            'ReceiptHandle' => $message->getReceiptHandle()
        ]);

        return $this;
    }
}
