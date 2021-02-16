<?php

namespace BayWaReLusy\Tools\Queue;

class QueueException extends \Exception
{
    protected int $httpErrorCode;
    protected string $httpErrorMessage;

    /**
     * QueueException constructor.
     * @param int $httpErrorCode
     * @param string $httpErrorMessage
     */
    public function __construct(int $httpErrorCode, string $httpErrorMessage)
    {
        $this->httpErrorCode    = $httpErrorCode;
        $this->httpErrorMessage = $httpErrorMessage;
    }
}
