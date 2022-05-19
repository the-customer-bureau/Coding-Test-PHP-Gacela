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
    public function welcomeMessage(): void
    {
        $this->getFactory()
            ->createApplication()
            ->welcomeMessage();
    }

    public function get_currency_list(): array
    {
        return $this->getFactory()
            ->createApplication()
            ->currencyList();
    }

    public function getCoversionURL(): string
    {

    }

    public function convertCurrency($conversion_data): float
    {
        return $this->getFactory()
            ->createApplication()
            ->covertCurrency($conversion_data);
    }
}
