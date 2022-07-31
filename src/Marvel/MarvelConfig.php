<?php declare(strict_types=1);

namespace Engineered\Marvel;

use Gacela\Framework\AbstractConfig;

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
final class MarvelConfig extends AbstractConfig
{
    /**
     * @return string
     */
    public function getEndpoint()
    {
        return 'https://mcuapi.herokuapp.com/api/v1';
    }
}
