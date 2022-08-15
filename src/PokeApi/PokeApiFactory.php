<?php
declare(strict_types = 1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */

namespace Engineered\PokeApi;

use Gacela\Framework\AbstractFactory;
use Engineered\PokeApi\Domain\PsrClient;


/**
 * @method PokeApiConfig getConfig()
 */
final class PokeApiFactory extends AbstractFactory
{
    public function createClient(): PsrClient
    {
        $config = $this->getConfig();

        return new PsrClient(
            $this->getProvidedDependency('psr.http_client'),
            $this->getProvidedDependency('psr.factories'),
            $config->baseUrl,
        );
    }
}
