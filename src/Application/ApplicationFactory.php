<?php
declare(strict_types = 1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

namespace Engineered\Application;

use Engineered\HPData\HPDataFacade;
use Gacela\Framework\AbstractFactory;
use Engineered\Application\Domain\Application;
use Engineered\Application\ApplicationDependencyProvider;

/**
 * @method ApplicationFactory getConfig()
 */
final class ApplicationFactory extends AbstractFactory
{
    public function createApplication(): Application
    {
        return new Application(
            $this->getHPDataFacade()
        );
    }

    private function getHPDataFacade(): HPDataFacade
    {
        return $this->getProvidedDependency(
            ApplicationDependencyProvider::FACADE_HPDATA
        );
    }
}
