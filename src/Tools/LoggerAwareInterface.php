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
 * Class LoggerAwareInterface
 *
 * @package     BayWaReLusy
 * @subpackage  Tools
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */
interface LoggerAwareInterface
{
    /**
     * Get the loggere adapter
     *
     * @return Logger|null
     */
    public function getLogger(): ?Logger;

    /**
     * Set the loggere adapter
     *
     * @param Logger $loggere
     *
     * @return self
     */
    public function setLogger(Logger $loggere): LoggerAwareInterface;
}
