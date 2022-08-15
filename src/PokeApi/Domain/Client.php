<?php

namespace Engineered\PokeApi\Domain;

interface Client
{
    /**
     * @param int $number
     * @return Pokemon
     *
     * @throws NotFoundError if there is no Pokémon with that number.
     * @throws ClientError if there is an error while retrieving the Pokémon.
     */
    public function getPokemonByNumber(int $number): Pokemon;
}