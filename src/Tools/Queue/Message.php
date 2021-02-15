<?php
/**
 * Message.php
 *
 * @date        26.02.2018
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file        Message.php
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools\Queue;

/**
 * Message
 *
 * @package     BayWaReLusy
 * @subpackage  Tools
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */
class Message
{
    /** @var string */
    protected $body;

    /** @var string */
    protected $receiptHandle;

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Message
     */
    public function setBody(string $body): Message
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptHandle(): string
    {
        return $this->receiptHandle;
    }

    /**
     * @param string $receiptHandle
     * @return Message
     */
    public function setReceiptHandle(string $receiptHandle): Message
    {
        $this->receiptHandle = $receiptHandle;
        return $this;
    }
}
