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

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @internal
 * @covers \Engineered\PokeApi\Domain\PsrClient
 */
class PsrClientTest extends TestCase
{
    public function testGetPokemonByNumber(): void
    {
        $httpClient = $this->createMock(ClientInterface::class);
        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $request = $this->createMock(RequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);
        $body = $this->createMock(StreamInterface::class);
        $client = new PsrClient($httpClient, $requestFactory, 'https://example.com');

        $requestFactory->expects($this->once())
            ->method('createRequest')
            ->with('GET', 'https://example.com/pokemon/100')
            ->willReturn($request)
        ;

        $request->expects($this->once())
            ->method('withHeader')
            ->with('Accept', 'application/json')
            ->willReturn($request)
        ;

        $httpClient->expects($this->once())
            ->method('sendRequest')
            ->with($request)
            ->willReturn($response)
        ;

        $response->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(200)
        ;

        $response->expects($this->once())
            ->method('getBody')
            ->willReturn($body)
        ;

        $body->expects($this->once())
            ->method('__toString')
            ->willReturn('{"id":100,"name":"Some Pokemon","sprites":{"other":{"official-artwork":{"front_default":"Artwork Url"}}}}')
        ;

        $pokemon = $client->getPokemonByNumber(100);

        $this->assertSame(100, $pokemon->getNumber());
        $this->assertSame('Some Pokemon', $pokemon->getName());
        $this->assertSame('Artwork Url', $pokemon->getImageUrl());
    }
}
