<?php declare(strict_types=1);

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
namespace Engineered\Application;

use Gacela\Framework\AbstractFacade;

/**
 * @method ApplicationFactory getFactory()
 */
final class ApplicationFacade extends AbstractFacade
{
    public function boot(): void
    {
        $this->getFactory()
            ->createApplication()
            ->boot();
    }
}
