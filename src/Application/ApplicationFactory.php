<?php
declare(strict_types = 1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

namespace Engineered\Application;

use Engineered\Application\Domain\FirstGenPokemonFinder;
use Engineered\Application\Domain\PokemonFinder;
use Engineered\Application\Infrastructure\NativeRenderer;
use Engineered\PokeApi\Domain\Client;
use Gacela\Framework\AbstractFactory;
use Engineered\Application\Domain\Application;


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
        return new NativeRenderer($this->getConfig()->getAppRootDir() . '/templates');
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
