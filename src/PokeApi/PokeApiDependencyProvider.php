<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\PokeApi;

use Buzz\Client\FileGetContents;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\Container\Container;
use Nyholm\Psr7\Factory\Psr17Factory;

final class PokeApiDependencyProvider extends AbstractDependencyProvider
{
    public function provideModuleDependencies(Container $container): void
    {
        $container->set('psr.http_client', static function (Container $container) {
            return new FileGetContents(
                $container->get('psr.factories')
            );
        });

        $container->set('psr.factories', static function () {
            return new Psr17Factory();
        });
    }
}
