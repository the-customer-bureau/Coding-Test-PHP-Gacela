<?php 

namespace Tests\Unit\HPData\Domain;

use PHPUnit\Framework\TestCase;
use Engineered\HPData\Domain\HPData;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class HPDataTest extends TestCase
{
    public function testMakeRequestReturnsAnArray(): void
    {
        $httpClientMock = $this->createMock(HttpClientInterface::class);
        $endpoint = 'https://url-to-test.com/api/endpoint';
        $hpData = new HPData($httpClientMock, $endpoint);
        $requestResponse = $hpData->makeRequest();

        $this->assertIsArray($requestResponse);
    }

    public function testMakeRequestReturnsAnEmptyArrayWithNon200StatusCode(): void
    {
        $endpoint = 'https://url-to-test.com/api/endpoint';
        $httpResponseMock = $this->createMock(ResponseInterface::class);
        $httpResponseMock->expects($this->once())
            ->method('getStatusCode')
            ->willReturn(404);

        $httpClientMock = $this->createMock(HttpClientInterface::class);
        $httpClientMock->expects($this->once())
            ->method('request')
            ->with('GET', $endpoint)
            ->willReturn($httpResponseMock);

        
        $hpData = new HPData($httpClientMock, $endpoint);
        $requestResponse = $hpData->makeRequest();

        $this->assertIsArray($requestResponse);
        $this->assertEmpty($requestResponse);
    }
}