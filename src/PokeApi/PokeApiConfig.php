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

namespace Engineered\PokeApi;

use Gacela\Framework\AbstractConfig;

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved.
 */
final class PokeApiConfig extends AbstractConfig
{
    private const DEFAULT_BASE_URL = 'https://pokeapi.co/api/v2';
    public string $baseUrl = self::DEFAULT_BASE_URL;
}
