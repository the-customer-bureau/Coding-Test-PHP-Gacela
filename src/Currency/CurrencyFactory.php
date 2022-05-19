<?php
declare(strict_types = 1);

namespace Engineered\Currency;

use Gacela\Framework\AbstractFactory;
use Engineered\Currency\Domain\Currency;
use Engineered\Application\Domain\Application;
use Engineered\Salary\CurrencyConfig;

/**
 * @method CurrencyFactory getConfig()
 */
final class CurrencyFactory extends AbstractFactory
{
  public function createCurrency(): Currency
  {
      return new Currency();
  }

  public function getConversionURL(): string 
  {
      return $this->getConfig()->getConversionURL();
  }

}