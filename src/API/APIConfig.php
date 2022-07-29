<?php 
declare(strict_types=1);

namespace Engineered\API;

use Gacela\Framework\AbstractConfig;

final class APIConfig extends AbstractConfig
{
    public const CATFACT_ADDRESS = 'CATFACT_ADDRESS';
    public const CATPICTURE_ADDRESS = 'CATPICTURE_ADDRESS';
    public function getAPIEndpointCatFact() : string
    {
        return $this->get(self::CATFACT_ADDRESS);
    }
    public function getAPIEndpointCatPicture() : string
    {
        return $this->get(self::CATPICTURE_ADDRESS);
    }
}