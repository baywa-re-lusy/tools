<?php
/**
 * Tools.php
 *
 * @date        16.02.2021
 * @author      Pascal Paulis <pascal.paulis@baywa-re.com>
 * @file        Tools.php
 * @copyright   Copyright (c) BayWa r.e. - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */

namespace BayWaReLusy\Tools;

use Laminas\ServiceManager\ServiceManager;

/**
 * Class Tools
 *
 * Entry-point to use the tool-set
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
class Tools extends ServiceManager
{
    public function __construct(ToolsConfig $config)
    {
        $services = require __DIR__ . '/../../config/module.config.php';
        parent::__construct($services['service_manager']);

        $this->setService(ToolsConfig::class, $config);
    }
}
