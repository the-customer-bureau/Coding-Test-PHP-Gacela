<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\Marvel\Domain;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class Marvel
{
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $client;

    /**
     * @var string
     */
    private string $endpoint;

    /**
     * @param HttpClientInterface $client
     * @param string $endpoint
     */
    public function __construct(
        HttpClientInterface $client,
        string $endpoint
    ) {
        $this->client = $client;
        $this->endpoint = $endpoint;
    }

    /**
     * @return mixed
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getLatestMovies()
    {
        $response = $this->client->request(
            'GET',
            $this->endpoint . '/movies',
            [
                'query' => [
                    'columns' => 'title,release_date,cover_url,overview,trailer_url,imdb_id',
                    'order' => 'release_date,ASC'
                ]
            ]
        );

        return json_decode($response->getContent(), true);

    }

    /**
     * @return mixed
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getLatestSeries()
    {
        $response = $this->client->request(
            'GET',
            $this->endpoint . '/tvshows',
            [
                'query' => [
                    'columns' => 'title,release_date,cover_url,overview,trailer_url,imdb_id',
                    'order' => 'release_date,ASC'
                ]
            ]
        );

        return json_decode($response->getContent(), true);
    }
}