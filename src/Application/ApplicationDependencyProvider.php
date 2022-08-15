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
