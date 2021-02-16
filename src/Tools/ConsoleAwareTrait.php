<?php
/**
 * ConsoleAwareInterface.php
 *
 * @date        16.02.2021
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
    protected ?Console $console = null;

    /**
     * Get the console adapter
     *
     * @return Console|null
     */
    public function getConsole(): ?Console
    {
        return $this->console;
    }

    /**
     * Set the console adapter
     *
     * @param Console $console
     *
     * @return ConsoleAwareInterface
     */
    public function setConsole(Console $console): ConsoleAwareInterface
    {
        $this->console = $console;

        return $this;
    }
}
