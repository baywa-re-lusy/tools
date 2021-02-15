<?php
/**
 * ConsoleAwareInterface.php
 *
 * @date        27.02.2018
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file        ConsoleAwareInterface.php
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools;

use Laminas\Console\Adapter\AdapterInterface as Console;

/**
 * ConsoleAwareTrait
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
trait ConsoleAwareTrait
{
    protected Console $console;

    /**
     * Get the console adapter
     *
     * @return Console
     */
    public function getConsole(): Console
    {
        return $this->console;
    }

    /**
     * Set the console adapter
     *
     * @param Console $console
     *
     * @return self
     */
    public function setConsole(Console $console)
    {
        $this->console = $console;

        return $this;
    }
}
