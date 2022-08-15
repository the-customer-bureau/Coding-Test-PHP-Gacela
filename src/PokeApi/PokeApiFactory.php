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

use Engineered\PokeApi\Domain\PsrClient;
use Gacela\Framework\AbstractFactory;

/**
 * @method PokeApiConfig getConfig()
 */
final class PokeApiFactory extends AbstractFactory
{
    public function createClient(): PsrClient
    {
        $config = $this->getConfig();

        return new PsrClient(
            $this->getProvidedDependency('psr.http_client'),
            $this->getProvidedDependency('psr.factories'),
            $config->baseUrl,
        );
    }
}
