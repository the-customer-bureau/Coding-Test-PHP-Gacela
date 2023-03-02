<?php
declare(strict_types = 1);

namespace Engineered\HPData;

use Engineered\HPData\Domain\HPData;
use Gacela\Framework\AbstractFactory;
use Symfony\Component\HttpClient\HttpClient;


/**
 * @method HPDataConfig getConfig()
 */

final class HPDataFactory extends AbstractFactory
{
    public function createHPData(): HPData
    {
        return new HPData(
            HttpClient::create(),
            $this->getConfig()->getCharactersEndpoint()
        );
    }
}