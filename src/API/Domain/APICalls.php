<?php 

namespace Engineered\API\Domain;

use Symfony\Contracts\HttpClient\HttpClientInterface;

final class APICalls {
    private HttpClientInterface $client;

    private string $endpoint;

    public function __construct(
        HttpClientInterface $client,
        string $endpoint
    ) {
        $this->client = $client;
        $this->endpoint = $endpoint;
    }

    public function getCatFact() : array
    {
        $response = $this->client->request(
            'GET',
            $this->endpoint . '/fact'
        );
        return $response->toArray();
    }

    public function getCatPicture() : string
    {
        $response = $this->client->request(
            'GET',
            $this->endpoint . '/cat'
        );
        return $response->getContent();
    }
}