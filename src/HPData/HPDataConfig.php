<?php
declare(strict_types=1);

namespace Engineered\HPData;

use Gacela\Framework\AbstractConfig;

final class HPDataConfig extends AbstractConfig
{
    public const API_URL = 'API_URL';

    public function getCharactersEndpoint(): string
    {
        return sprintf(
            '%s/characters',
            $this->get(self::API_URL)
        );
    }

    public function getStudentsEndpoint(): string
    {
        return sprintf(
            '%s/students',
            $this->get(self::API_URL)
        );
    }
}