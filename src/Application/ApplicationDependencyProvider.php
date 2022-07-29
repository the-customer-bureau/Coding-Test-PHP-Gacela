<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\Application;

use Engineered\HPData\HPDataFacade;
use Gacela\Framework\Container\Container;
use Gacela\Framework\AbstractDependencyProvider;

final class ApplicationDependencyProvider extends AbstractDependencyProvider
{

    public const FACADE_HPDATA = 'FACADE_HPDATA';

    public function provideModuleDependencies(Container $container): void
    {
        $this->addHPDataFacade($container);
    }

    private function addHPDataFacade(Container $container): void
    {
        $container->set(
            self::FACADE_HPDATA,
            function (Container $container) {
                return $container->getLocator()->get(HPDataFacade::class);
            }
        );
    }
}
