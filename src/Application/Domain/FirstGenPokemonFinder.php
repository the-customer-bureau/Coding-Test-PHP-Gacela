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

namespace Engineered\Application\Domain;

final class FirstGenPokemonFinder implements PokemonFinder
{
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
