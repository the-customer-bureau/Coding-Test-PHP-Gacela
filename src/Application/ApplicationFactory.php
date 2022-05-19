<?php
declare(strict_types = 1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

namespace Engineered\Application;

use Gacela\Framework\AbstractFactory;
use Engineered\Application\Domain\Application;
use Engineered\Application\ApplicationConfig;

/**
 * @method ApplicationFactory getConfig()
 */
final class ApplicationFactory extends AbstractFactory
{
    public function createApplication(): Application
    {
        return new Application();
    }
}
