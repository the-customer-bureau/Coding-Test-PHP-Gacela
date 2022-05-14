
<?php
/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

require __DIR__ . '/vendor/autoload.php';

use Engineered\Application\ApplicationFacade;

$application = new ApplicationFacade();

$application->boot();

