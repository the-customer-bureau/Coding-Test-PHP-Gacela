<?php

namespace Engineered\Application\Domain;

interface PokemonFinder
{
    /**
     * @param string $name
     * @return int
     */
    public function findPokemonFor(string $name): int;
}