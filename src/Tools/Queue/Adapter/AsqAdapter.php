<?php
/**
 * AsqAdapter.php
 *
 * @date        27.02.2018
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file        AsqAdapter.php
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue\Adapter;

use Aws\Sqs\SqsClient;
use BayWaReLusy\Tools\Queue\Message;
use MicrosoftAzure\Storage\Queue\QueueRestProxy as AsqClient;

/**
 * AsqAdapter
 *
 * @package    Tools
 * @subpackage Service
 * @author     Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright  Copyright (c) BayWa r.e. - All rights reserved
 * @license    Unauthorized copying of this source code, via any medium is strictly
 *             prohibited, proprietary and confidential.
 */
class AsqAdapter implements AdapterInterface
{
    protected AsqClient $asqClient;

    /**
     * AsqAdapter constructor.
     * @param AsqClient $asqClient
     */
    public function __construct(AsqClient $asqClient)
    {
        $this->asqClient = $asqClient;
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
        if ($messageGroupId || $messageDeduplicationId) {
            throw new \InvalidArgumentException('FIFO not supported for Azure Storage Queue Service.');
        }

        $this->asqClient->createMessage($queueUrl, $messageBody);

        return $this;
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
