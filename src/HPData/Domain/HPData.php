<?php
declare(strict_types=1);

namespace Engineered\HPData\Domain;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HPData
{

    public function __construct(
        private HttpClientInterface $client,
        private String $endpoint,
    )
    {
        
    }

    public function getCharacters(): void
    {
        echo count($this->makeRequest());
    }

    public function getCharactersHTML(): void
    {
        
    }

    private function makeRequest()
    {
        $response = $this->client->request(
            'GET',
            $this->endpoint
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            return [];
        }

        return $response->toArray();
    }
}