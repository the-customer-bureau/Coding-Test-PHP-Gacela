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

use Engineered\Application\Domain\Application;
use Engineered\Application\Domain\FirstGenPokemonFinder;
use Engineered\Application\Domain\PokemonFinder;
use Engineered\Application\Infrastructure\NativeRenderer;
use Engineered\PokeApi\Domain\Client;
use Gacela\Framework\AbstractFactory;

/**
 * @method ApplicationConfig getConfig()
 */
final class ApplicationFactory extends AbstractFactory
{
    public function createApplication(): Application
    {
        return new Application(
            $this->createRenderer(),
            $this->getPokemonFinder(),
            $this->getPokemonClient(),
        );
    }

    public function createRenderer(): NativeRenderer
    {
        return new NativeRenderer($this->getConfig()->getAppRootDir().'/templates');
    }

    public function getPokemonClient(): Client
    {
        return $this->getProvidedDependency('poke_api.client');
    }

    public function getPokemonFinder(): PokemonFinder
    {
        return new FirstGenPokemonFinder();
    }
}
