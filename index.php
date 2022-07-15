
<?php
/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

require __DIR__ . '/vendor/autoload.php';

use Gacela\Framework\Gacela;
use Gacela\Framework\Bootstrap\GacelaConfig;
use Engineered\Application\ApplicationFacade;


Gacela::bootstrap(__DIR__, GacelaConfig::withPhpConfigDefault());

$application = new ApplicationFacade();

$application->boot();

