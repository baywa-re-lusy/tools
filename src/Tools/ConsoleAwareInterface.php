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
 * Class ConsoleAwareInterface
 *
 * @package     BayWaReLusy
 * @subpackage  Tools
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */
interface ConsoleAwareInterface
{
    /**
     * Get the console adapter
     *
     * @return Console|null
     */
    public function getConsole(): ?Console;

    /**
     * Set the console adapter
     *
     * @param Console $console
     *
     * @return self
     */
    public function setConsole(Console $console): ConsoleAwareInterface;
}
