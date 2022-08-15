<?php declare(strict_types=1);

namespace Engineered\PokeApi;

use Gacela\Framework\AbstractConfig;

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
final class PokeApiConfig extends AbstractConfig
{
    private const DEFAULT_BASE_URL = 'https://pokeapi.co/api/v2';
    public string $baseUrl = self::DEFAULT_BASE_URL;
}
