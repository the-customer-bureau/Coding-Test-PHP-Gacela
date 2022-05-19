<?php declare(strict_types=1);

namespace Engineered\Currency;

use Gacela\Framework\AbstractFacade;

/**
 * @method ApplicationFactory getFactory()
 */
final class CurrencyFacade extends AbstractFacade
{
  public function welcomeMessage(): void
  {
      $this->getFactory()
          ->createCurrency()
          ->welcomeMessage();
  }

  public function getCurrencyList(): array
  {
    return $this->getFactory()
            ->createCurrency()
            ->currencyList();
  }

  public function convertCurrency($conversion_data): string
  {
      $conversion_url = $this->getFactory()->getConversionURL();

      return $this->getFactory()
          ->createCurrency()
          ->covertCurrency($conversion_url,$conversion_data);
  }
}
