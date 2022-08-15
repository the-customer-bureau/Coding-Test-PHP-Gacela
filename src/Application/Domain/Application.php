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

use Engineered\Application\Infrastructure\Renderer;
use Engineered\PokeApi\Domain\Client;
use Engineered\PokeApi\Domain\NotFoundError;

class Application
{
    private Renderer $renderer;
    private PokemonFinder $finder;
    private Client $client;

    public function __construct(Renderer $renderer, PokemonFinder $finder, Client $client)
    {
        $this->renderer = $renderer;
        $this->finder = $finder;
        $this->client = $client;
    }

    /**
     * @throws \Engineered\Application\Infrastructure\RenderError
     * @throws \Engineered\Application\Infrastructure\TemplateNotFound
     * @throws \Engineered\PokeApi\Domain\ClientError
     */
    public function boot(): void
    {
        $name = $_GET['name'] ?? '';
        if ('' === $name) {
            echo $this->renderer->render('input');

            return;
        }

        $name = ucwords(strtolower($name), ' \'');

        $pokemonNum = $this->finder->findPokemonFor($name);

        try {
            $pokemon = $this->client->getPokemonByNumber($pokemonNum);
        } catch (NotFoundError $e) {
            echo $this->renderer->render('no-pokemon', [
                'name' => $name,
            ]);

            return;
        }

        echo $this->renderer->render('pokemon', [
            'name' => $name,
            'pokemon' => $pokemon,
        ]);
    }
}
