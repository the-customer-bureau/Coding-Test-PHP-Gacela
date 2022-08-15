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

namespace Engineered\PokeApi\Domain;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface as PsrResponse;

final class PsrClient implements Client
{
    private ClientInterface $httpClient;
    private RequestFactoryInterface $request;
    private string $baseUrl;

    public function __construct(
        ClientInterface $httpClient,
        RequestFactoryInterface $request,
        string $baseUrl
    ) {
        $this->httpClient = $httpClient;
        $this->request = $request;
        $this->baseUrl = $baseUrl;
    }

    /**
     * {@inheritDoc}
     */
    public function getPokemonByNumber(int $number): Pokemon
    {
        $data = $this->makeRequest('GET', '/pokemon/'.$number);

        return new Pokemon(
            (int) $data['id'],
            (string) $data['name'],
            (string) $data['sprites']['other']['official-artwork']['front_default'],
        );
    }

    /**
     * @throws ClientError
     * @throws NotFoundError
     */
    private function makeRequest(string $method, string $path): array
    {
        $url = $this->baseUrl.$path;
        $request = $this->request->createRequest($method, $url)
            ->withHeader('Accept', 'application/json')
        ;

        try {
            $response = $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            throw new ClientError('Error while making the request', 0, $e);
        }

        $status = $response->getStatusCode();

        if (404 === $status) {
            throw new NotFoundError('Pokemon not found');
        }

        if (200 !== $status) {
            throw new ClientError('Error in server response');
        }

        return $this->responseToArray($response);
    }

    /**
     * @throws \Engineered\PokeApi\Domain\ClientError
     */
    private function responseToArray(PsrResponse $response): array
    {
        $body = (string) $response->getBody();
        if ('' === $body) {
            return [];
        }

        try {
            return json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new ClientError('Error while decoding json response', 0, $e);
        }
    }
}
