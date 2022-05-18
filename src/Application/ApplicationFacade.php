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
    public function welcome_message(): void
    {
        $this->getFactory()
            ->createApplication()
            ->welcome_message();
    }

    public function get_currency_list(): array
    {
        return $this->getFactory()
            ->createApplication()
            ->currency_list();
    }

    public function convert_currency($conversion_data): float
    {
        return $this->getFactory()
            ->createApplication()
            ->covert_currency($conversion_data);
    }
}
