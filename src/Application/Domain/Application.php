<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
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

    /**
     * @param Renderer $renderer
     * @param PokemonFinder $finder
     * @param Client $client
     */
    public function __construct(Renderer $renderer, PokemonFinder $finder, Client $client)
    {
        $this->renderer = $renderer;
        $this->finder = $finder;
        $this->client = $client;
    }

    /**
     * @return void
     *
     * @throws \Engineered\Application\Infrastructure\RenderError
     * @throws \Engineered\Application\Infrastructure\TemplateNotFound
     * @throws \Engineered\PokeApi\Domain\ClientError
     */
    public function boot(): void
    {
        $name = $_GET['name'] ?? '';
        if ($name === '') {
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
