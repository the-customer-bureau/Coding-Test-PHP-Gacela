<?php
declare(strict_types = 1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

namespace Engineered\Marvel;

use Gacela\Framework\AbstractFactory;
use Engineered\Marvel\Domain\Marvel;
use Symfony\Component\HttpClient\HttpClient;


/**
 * @method MarvelFactory getConfig()
 */
final class MarvelFactory extends AbstractFactory
{
    /**
     * @return Marvel
     */
    public function createMarvel(): Marvel
    {
        return new Marvel(
            HttpClient::create(),
            $this->getConfig()->getEndpoint()
        );
    }
}
