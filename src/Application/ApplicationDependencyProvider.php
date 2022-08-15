<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\Application;

use Engineered\PokeApi\PokeApiFacade;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;

final class ApplicationDependencyProvider extends AbstractDependencyProvider
{
    public function provideModuleDependencies(Container $container): void
    {
        $container->set('poke_api.client', static function (Container $container) {
            return $container->getLocator()->get(PokeApiFacade::class);
        });
    }
}
