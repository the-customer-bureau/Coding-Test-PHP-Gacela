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

    public function getCurrencyList(): array
    {
        return $this->getFactory()
            ->createApplication()
            ->currencyList();
    }

    public function getConversionURL(): string
    {
        return $this->getFactory()
            ->getConversionURL();
    }

    public function convertCurrency($conversion_data): float
    {
        $conversion_url = $this->getConversionURL();

        return $this->getFactory()
            ->createApplication()
            ->covertCurrency($conversion_url,$conversion_data);
    }
}
