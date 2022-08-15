<?php

namespace Engineered\Application\Domain;

final class FirstGenPokemonFinder implements PokemonFinder
{
    /**
     * @param string $name
     * @return int
     */
    public function findPokemonFor(string $name): int
    {
        $name = md5($name);
        $num = 0;
        foreach (str_split($name) as $char) {
            $num += ord($char);
        }

        return $num % 151; // Mod to only first gen Pokémon
    }
}