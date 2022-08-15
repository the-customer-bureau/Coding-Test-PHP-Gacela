<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\PokeApi;

use Engineered\PokeApi\Domain\Client;
use Engineered\PokeApi\Domain\Pokemon;
use Gacela\Framework\AbstractFacade;

/**
 * @method PokeApiFactory getFactory()
 */
final class PokeApiFacade extends AbstractFacade implements Client
{
    public function getPokemonByNumber(int $number): Pokemon
    {
        return $this->getFactory()
            ->createClient()
            ->getPokemonByNumber($number);
    }
}
