<?php declare(strict_types=1);

namespace Engineered\Currency;

use Gacela\Framework\AbstractConfig;

final class CurrencyConfig extends AbstractConfig
{
  private $convertUrl;

  public function __construct()
  {
    $this->convertUrl = 'https://api.exchangerate.host/convert?';
  }

  public function getConversionURL(): string
  {
      return $this->convertUrl;
  }
}
