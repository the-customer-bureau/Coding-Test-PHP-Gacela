<?php

declare(strict_types=1);

/**
 * @project TCB Coding Test
 * @link https://github.com/the-customer-bureau/Coding-Test-PHP-Gacela
 * @project engineered/coding_test_php_gacela
 * @author The Customer Bureau
 * @license GPL-3.0
 * @copyright 2022 The Customer Bureau
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
