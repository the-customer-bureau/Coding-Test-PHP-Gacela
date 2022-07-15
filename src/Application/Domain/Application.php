<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\Application\Domain;

use Engineered\HPData\HPDataFacade;

class Application
{
    public function __construct(
        private HPDataFacade $hpDataFacade,
    )
    {

    }

    public function boot(): void
    {
        $this->hpDataFacade->getCharacters();
    }
}
