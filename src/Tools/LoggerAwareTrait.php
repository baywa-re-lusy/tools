<?php
/**
 * LoggerAwareInterface.php
 *
 * @date        16.02.2021
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file        LoggerAwareInterface.php
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools;

use Monolog\Logger;

/**
 * LoggerAwareTrait
 *
 * @package     BayWaReLusy
 * @subpackage  Tools
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 *
 * @codeCoverageIgnore
 */
trait LoggerAwareTrait
{
    protected ?Logger $logger = null;

    /**
     * Get the logger adapter
     *
     * @return Logger|null
     */
    public function getLogger(): ?Logger
    {
        return $this->logger;
    }

    /**
     * Set the logger adapter
     *
     * @param Logger $logger
     *
     * @return LoggerAwareInterface
     */
    public function setLogger(Logger $logger): LoggerAwareInterface
    {
        $this->logger = $logger;

        return $this;
    }
}
