<?php declare(strict_types=1);

namespace Engineered\Application;

use Gacela\Framework\AbstractConfig;

/**
 * Copyright 2022 - The Customer Bureau - All Rights Reserved
 */
final class ApplicationConfig extends AbstractConfig
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
