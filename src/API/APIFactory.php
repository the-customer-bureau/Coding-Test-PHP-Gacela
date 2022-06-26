<?php 
declare(strict_types=1);

namespace Engineered\API;

use Engineered\API\Domain\APICalls;
use Gacela\Framework\AbstractFactory;
use Symfony\Component\HttpClient\HttpClient;
/**
 * @method APIConfig getConfig()
 */
final class APIFactory extends AbstractFactory 
{
    public function connectCatFactEndpoint()
    {
        return new APICalls(HttpClient::create(), $this->getConfig()->getAPIEndpointCatFact());
    }
    public function connectCatPictureEndpoint()
    {
        return new APICalls(HttpClient::create(), $this->getConfig()->getAPIEndpointCatPicture());
    }
}